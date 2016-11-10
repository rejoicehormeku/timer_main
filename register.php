<?php

include_once("users.php");

if(isset($_REQUEST['cmd'])){
$cmd=$_REQUEST['cmd'];
switch($cmd){
	case 1:
	register();
	break;
	default:
	echo "wrong command";
	break;
}
}
function register(){
	if(!isset($_REQUEST['email'])){
		exit();		
		//if no data, exit
	}
	
$username=$_REQUEST['username'];
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$email=$_REQUEST['email'];
$contact=$_REQUEST['contact'];
$password=$_REQUEST['password'];

$obj=new users();

$row=$obj->authenticateUser($email);
$num_rows=$obj->fetch();
// echo $num_rows['count(*)'];
// if user already has an account
if($num_rows['count(*)'] > 0)
{	
	$errorMessage = "exist"; 
	// echo $errorMessage;
	$response_array['message'] = 'failed'; 
	echo json_encode($response_array);
	return json_encode($response_array);
}
// the user does not have account
else
	{
		// echo "checking if uname exists";
		$obj->checkUnameExists($username);
		$num_rows=$obj->fetch();

		// check if username is available
		if ($num_rows['count(*)'] > 0) {			
		$errorMessage = "Username already taken";
		// echo $errorMessage;
		$response_array['message'] = 'failed'; 
		echo json_encode($response_array);
		return json_encode($response_array);
		} 
				else {
				// echo "going to add user";
				$date=date("d-m-y h:i:s");
				$q = $obj->addUser($fname, $lname, $password, $contact, $email, $username);
						if($q==false)
						{
						 $response_array['message'] = 'failed'; 
						echo json_encode($response_array);
						return json_encode($response_array);
						}
									else
									{
									 $response_array['message'] = 'success'; 
									echo json_encode($response_array);
									return json_encode($response_array);
									}
}

}
}

?>