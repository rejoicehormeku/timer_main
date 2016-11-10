<?php
include_once("users.php");

if(isset($_REQUEST['cmd'])){
$cmd=$_REQUEST['cmd'];
switch($cmd){
	case 1:
	login();
	break;
	default:
	echo "wrong command";
	break;
}
}

function login()
{
	if(!isset($_REQUEST['username'])){
		exit();		
		//if no data, exit
	}
$username=($_REQUEST['username']);
$password=($_REQUEST['password']);

$obj = new users();
$login=$obj->enableUsertoLogin($username, $password);
$row=$obj->fetch();

if (($row['password']== $password) && ($row['Username']== $username)){
	// echo "your pword is right";
	session_start();
	$_SESSION['login'] = "1";
	header ("Location: mypage.php");
	$response_array['message'] = 'success'; 
						echo json_encode($response_array);
						return json_encode($response_array);
						}

else if (($row['password']!=$password) || ($row['Username']!= $username))
// {echo "your password or username may be wrong";
	// echo $row['password'];
	// echo $row['Username'];
	
$response_array['message'] = 'failed'; 
						echo json_encode($response_array);
						return json_encode($response_array);
						}

?>