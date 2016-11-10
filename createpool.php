<?php

include_once("users.php");

if(isset($_REQUEST['cmd'])){
$cmd=$_REQUEST['cmd'];
switch($cmd){
	case 1;
	create();
	break;

	default:
	echo "wrong command";
	break;
}
}
function create(){
	if(!isset($_REQUEST['username'])){
		exit();		
		//if no data, exit
	}
	
$username=$_REQUEST['username'];
$ltime=$_REQUEST['ltime'];
$dtime=$_REQUEST['dtime'];
$savail=$_REQUEST['savail'];
$fare=$_REQUEST['fare'];
$mobile=$_REQUEST['mobile'];
$text=$_REQUEST['text'];

$obj=new users();
$q = $obj->createPool($ltime, $dtime, $mobile, $fare, $savail, $username, $text);

if($q==false)
{
 $response_array['status'] = 'failed'; 
echo json_encode($response_array);
return json_encode($response_array);
}
else
{
 $response_array['status'] = 'success'; 
echo json_encode($response_array);
return json_encode($response_array);
}
}



?>