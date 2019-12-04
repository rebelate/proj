<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <title>Control &mdash; Administrator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.css">

</head>

<body>
  <?php
  session_start();
  require 'config.php';
  require 'usrcheck.php';
  if($logged!=1)echo $_usr_err;
  else if ($result->num_rows==0)echo $_adm_err;

  ?>
  <div id="page">

    <a href="#" class="js-nav-toggle nav-toggle"><i></i></a>
    <aside id="aside" class="border">

      <h1 id="logo"><br><a href="index.php">Lamx</a></h1>
      <nav id="main-menu" role="navigation">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="dashboard.php">Dashboard</a></li>
          <li class="active"><a href='admin.php'>Control</a></li>
          <li><a href=logout.php title='Klik disini untuk logout'>Logout</a></li>
        </ul>
      </nav>
    </aside>

    <div id="main" class="fadeInUp">
      <div class="narrow-content">
        <h2 class="heading  nbar">Control</h2>
        <div class="row">

          <div class="container" style="width:87%">

            <div id="users">
              <br />
              <table class="table table-bordered" style="">
                <tr>
                  <th width="100%">Name</th>
                  <th width="0%" colspan="2"><center>ACTION</center></th>
                </tr>
                <?php
                $result = $mysqli->query('SELECT * from users');
                while($row = $result->fetch_array())
                { ?>
                  <tr>
                    <td>
                      <?= $row[1]; ?>
                    </td>
                    <td>
                      <input type="button" name="edit" value="Edit" id="<?= $row[0]; ?>" class="btn btn-info edit_data" />
                    </td>
                    <td>
                      <input type="button" name="view" value="view" id="<?= $row[0]; ?>" class="btn btn-info btn-xs view_data" />
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<!-------------------->
<!-- 3rd JS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>

<script src="js/main.js"></script>

<div id="dataModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Details</h4>
      </div>
      <div class="modal-body" id="ctl_detail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="edit_Modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"></div>
      <!--<button type="button" class="close" data-dismiss="modal">&times;</button> -->
      <!-- </div> -->
      <div class="modal-body">

        <form method="post" id="edit">
          <label>Username</label>
          <input type="text" name="username" id="username" class="form-control" />
          <br />
          <label>Admin</label>
          <select name="isadmin" id="isadmin" class="form-control">
            <option value="0">False</option>
            <option value="1">True</option>
          </select>
          <br />
          <input type="hidden" name="param" id="param" />
          <input type="submit" name="update" value="Update" class="btn btn-success" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-------------------->
<script>
$(document).ready(function(){
  $(document).on('click', '.edit_data', function(){
    var param = $(this).attr("id");
    $.ajax({
      url:"control/fetch.php",
      method:"POST",
      data:{param:param},
      dataType:"json",
      success:function(data){
        $('#username').val(data.username);
        $('#isadmin').val(data.isadmin);
        $('#param').val(data.id_user); //edit param defined here
        $('#edit_Modal').modal('show');
      }
    });
  });
  $('#edit').on("submit", function(e){
    e.preventDefault();
    $.ajax({
      url:"control/edit.php",
      method:"POST",
      data:$('#edit').serialize(),
      success:function(data){
        $('#edit')[0].reset();
        $('#edit_Modal').modal('hide');
        $('#users').html(data);
      }
    });

  });
  $(document).on('click', '.view_data', function(){
    var param = $(this).attr("id");
    if(param != '')
    {
      $.ajax({
        url:"control/view.php",
        method:"POST",
        data:{param:param},
        success:function(data){
          $('#ctl_detail').html(data);
          $('#dataModal').modal('show');
        }
      });
    }
  });
});
</script>
