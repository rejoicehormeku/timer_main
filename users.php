<?php
/**
*/
include_once("adb.php");
/**
*Users  class
*/
class users extends adb{
	function users(){
	}
	/**
	*Adds a new user
	*@param string username login name
	*@param string firstname first name
	*@param string lastname last name
	*@param string password login password
	*@param string usergroup group id
	*@param int permission permission as an int
	*@param int status status of the user account
	*@return boolean returns true if successful or false 
	*/
	function addUser($Firstname,
	$Lastname,
    $password,
    $contact, 
	$email,
	$Username ){
		$strQuery="insert into users set
						
						firstname='$Firstname',
						lastname='$Lastname',
						password='$password',
						email='$email',
						contact=$contact,
						Username='$Username'";
		return $this->query($strQuery);	
		
	}
	
	function createPool($ltime, $dtime, $mobile, $fare, $savail, $username, $text){
		$query1 = "select Userid from users where Username = '$username'";
		$result = $this->query($query1);
		$row = $this->fetch();
		$id = $row['Userid'];
		echo $id;
		
		$strQuery="insert into pool set
						uid = $id,
						ltime = $ltime,
						dtime = $dtime, 
						mobile = $mobile, 
						fare = $fare, 
						savail = $savail, 
						username = '$username', 
						text = '$text'";
		return $this->query($strQuery);	
		
	}
	/**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function authenticateUser($email){
	$strQuery="select count(*) from users where email='$email'";		
	return $this->query($strQuery);
   	
	}
	
	function checkUnameExists($Username){
	$strQuery="select count(*) from users where Username='$Username'";			
	return $this->query($strQuery);
	}
	
	/**
	*Searches for user by username, fristname, lastname 
	*@param string text search text
	*@return boolean true if successful, else false
	*/
	function searchUsers($text=false){
		$filter=false;
		if($text!=false){
			$filter="username like '%$text%' or firstname like '%$text%' or lastname like '%$text%' ";
		}
			
		return $this->getUsers($filter);
		echo $text;
	}
	
	/**
	*delete user
	*@param int usercode the user code to be deleted
	*returns true if the user is deleted, else false
	*/
	function deleteUser($usercode){
		//query
	$strQuery="delete from users where usercode=$usercode";
	return $this->query($strQuery);
	}
	
	function enableUsertoLogin($Username,$password){
		//query		
		$strQuery="select * from users where Username='$Username'";
		return $this->query($strQuery);

	}
	
		function editUser($usercode,$username,$firstname,$lastname,$usergroup,$password,$permission,$status){
	$strQuery="update users set					
						username='$username',
						firstname='$firstname',
						lastname='$lastname',
						usergroup=$usergroup,
						pword=MD5('$password'),
						permission='$permission',
						status='$status' where usercode=$usercode";
						echo $strQuery;
			return $this->query($strQuery);	
		}	
			
		function getOldUser($usercode){
			
			
			$entered=$usercode;
			if ($entered==true){
			$filter="usercode= $entered";
			}
			else{
				echo "No usercode has been entered";
			}
			$this->getUsers($filter);
		}	

}
?>