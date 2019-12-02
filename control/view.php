<?php
require '../config.php';
if(isset($_POST["param"]))
{

  $output = '';
  $query = "SELECT * FROM users,login_log WHERE users.username = '".$_POST["param"]."' AND login_log.username = '".$_POST["param"]."' ";
  $result = $mysqli->query($query);
  if($result->num_rows==0){$output.='User belum melakukan login';}
  else{
    $output .= '
    <div class="table-responsive">
    <table class="table table-bordered">';
    while($row = $result->fetch_object())
    {
      $output .= '
      <tr>
      <td width="30%"><label>Username</label></td>
      <td width="70%">'.$row->username.'</td>
      </tr>
      <tr>
      <td width="30%"><label>Register Date</label></td>
      <td width="70%">'.$row->registerdate.'</td>
      </tr>
      <tr>
      <td width="30%"><label>Log</label></td>
      <td width="70%">'.$row->last_login.'</td>
      </tr>
      ';
    }
    $output .= '
    </table>
    </div>
    ';
  }
  echo $output;
}
?>
