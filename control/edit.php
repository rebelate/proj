
<?php
require '../config.php';
if(!empty($_POST))
{
  $output = '';
  $query='';
  $username=$_POST['username'];
  $isadmin=$_POST['isadmin'];
  if($_POST['param'] != '')
  {
    $query = "UPDATE users SET username='$username', isadmin = '$isadmin' WHERE id_user = '".$_POST['param']."'";
    $message = 'User Updated!'; // executed in line 17
  }
  if($mysqli->query($query))
  {
    $output .= '<label class="text-success"><br>' . $message . '</label>';
    $sel_query = "SELECT * FROM users ";
    $result = $mysqli->query($sel_query);
    $output .= '
    <table class="table table-bordered" style="">
    <tr>
    <th width="100%">Name</th>
    <th width="0%" colspan="2"><center>ACTION</center></th>
    </tr>
    ';
    while($row = $result->fetch_array())
    {
      $output .= '
      <tr>
      <td>' . $row[1] . '</td>
      <td><input type="button" name="edit" value="Edit" id="'.$row[0] .'" class="btn btn-info btn-xs edit_data" /></td>
      <td><input type="button" name="view" value="view" id="' . $row[0] . '" class="btn btn-info btn-xs view_data" /></td>
      </tr>
      ';
    }
    $output .= '</table>';
  }
  echo $output;
}
?>
