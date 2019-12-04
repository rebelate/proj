<?php
//fetch.php
require '../config.php';
if(isset($_POST["param"]))
{
  $query = "SELECT * FROM users WHERE id_user = '".$_POST["param"]."'";
  $result = $mysqli->query($query);
  $row = $result->fetch_array();
  echo json_encode($row);
}
?>
