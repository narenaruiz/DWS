<!-- Login -->
<!-- Apartado 11.9 -->
<?php
// core configuration
include_once "config/core_login.php";

// include classes
include_once 'config/database_login.php';
include_once 'objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$user = new User($db);

// set access code
$user->access_code=isset($_GET['access_code']) ? $_GET['access_code'] : "";

// verify if access code exists
if(!$user->accessCodeExists()){
	die("ERROR: Access code not found.");
}

// redirect to login
else{
	
	// update status
	$user->status=1;
	$user->updateStatusByAccessCode();
	
	// and the redirect
	header("Location: {$home_url}login.php?action=email_verified");
}
?>