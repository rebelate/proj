<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'Prosite');

// Attempt to connect
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
  die("ERROR: Could not connect. " . $mysqli->connect_error);
}
$_error="Oops! Ada masalah, Silahkan coba kembali.";
$_usr_err="<script type=text/javascript>alert('You have not logged in! Redirecting..');
location='index.php'</script>";
$_adm_err="<script type=text/javascript>alert('You are not an admin! Redirecting..');
location='index.php'</script>";
?>
