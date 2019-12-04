<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
  require_once 'config.php';
  $username = $_SESSION['username'];
  $result   = $mysqli->query("SELECT * FROM v_admin WHERE username='$username'");
  $logged=true;
}
else{$logged=false;}
?>
