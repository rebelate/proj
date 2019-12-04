<?php
session_start();
if ($_SESSION["loggedin"] == true) {
  require 'config.php';
  $username = $_SESSION['username'];
  $result   = $mysqli->query("SELECT * FROM v_admin WHERE username= '".$username."' .");
  $row = $result->fetch_array();
  echo $row[0];
  // if ($result->num_rows=1){echo "<li><a href='admin.php'>Control</a></li>";}
  // else{echo "";}
}
?>
