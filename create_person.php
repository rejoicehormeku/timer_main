create_person.php
<?php
 
/*
 * Following code will create a new PERSON row
 * All PERSON details are read from HTTP Post Request
 */
 
// array for JSON response

   // include db connect class
    include_once('db_connect.php');
	
$response = array();
 
// check for required fields
if (isset($_POST['name']) && isset($_POST['pword']) && isset($_POST['contact'])) {
 
    $Username = $_POST['name'];
	$Firstname = $_POST['firstname'];
$Lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
	$email = $_POST['email'];
	

	
 
 
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO user(firstname,lastname, password, email, contact, Username) VALUES('$Username','$Firstname','$Lastname','.md5($password)',$contact,'$email')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "person successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>


