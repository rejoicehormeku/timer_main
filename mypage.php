<?php


header('Location: mypage.html');
include_once("users.php");

if(isset($_REQUEST['cmd'])){
$cmd=$_REQUEST['cmd'];
switch($cmd){
	case 1:
	();
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
		
	
	
?>
