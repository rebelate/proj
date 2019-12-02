
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
    $query = "UPDATE users SET username='$username', isadmin = '$isadmin' WHERE username = '".$_POST['param']."'";
    $message = 'User Updated!'; // executed in line 16
  }
  if($mysqli->query($query))
  {
    $output .= '<label class="text-success"><br>' . $message . '</label>';
    $sel_query = "SELECT * FROM users ";
    $result = $mysqli->query($sel_query);
    $output .= '
    <table class="table table-bordered">
    <tr>
    <th width="70%">Employee Name</th>
    <th width="15%">Edit</th>
    <th width="15%">View</th>
    </tr>
    ';
    while($row = $result->fetch_array())
    {
      $output .= '
      <tr>
      <td>' . $row[1] . '</td>
      <td><input type="button" name="edit" value="Edit" id="'.$row[1] .'" class="btn btn-info btn-xs edit_data" /></td>
      <td><input type="button" name="view" value="view" id="' . $row[1] . '" class="btn btn-info btn-xs view_data" /></td>
      </tr>
      ';
    }
    $output .= '</table>';
  }
  echo $output;
}
?>
