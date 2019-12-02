<?php
session_start();
require_once 'config.php';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

    echo "<br>Welcome <li class=active><a><b>".$_SESSION['username']."</b></a></li>";
    echo "<br><li><a href=dashboard.php title='Klik disini untuk menuju dashboard'>Dashboard</a></li>";
    include 'usrcheck.php';if ($result->num_rows==1){echo "<li><a href='admin.php'>Control</a></li>";}
    echo "<li><a href=logout.php title='Klik disini untuk logout'>Logout</a></li>";
    echo "<style>.wrapper{display:none;}</style>";

}

// def variable kosong 
$username = $password = "";
$username_err = $password_err = "";
$stamp=substr($_SERVER['HTTP_USER_AGENT'], 0,49).$_SERVER['REMOTE_ADDR'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // is username empty?
    if(empty(trim($_POST["username"]))){
        $username_err = "Silahkan Isi username!";
    } else{
        $username = trim($_POST["username"]);
    }

    // is password empty ?
    if(empty(trim($_POST["password"]))){
        $password_err = "Silahkan masukkan kata sandi.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate 
    if(empty($username_err) && empty($password_err)){
        // Prepare a statement
        $query = "SELECT id, username, password FROM users WHERE username = ?";
        if($stmt = $mysqli->prepare($query)){
            // Bind for prepare
            $stmt->bind_param("s", $param_username);
            $param_username = $username;

            // execute
            $stmt->execute();
            $stmt->store_result();

                // is username exist? -> verify pass
                if($stmt->num_rows == 1){
                    // Bind result
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        // if(password_verify($password, $hashed_password)){
                        if(md5($password)==$hashed_password){

                            session_start();
                            $query = "INSERT INTO login_log (username, last_login) values ('$username' ,'$stamp') ON DUPLICATE KEY UPDATE username='$username', last_login='$stamp'";
        $mysqli->query($query) or die(mysqli_error($mysqli)); 
                            // Store data pada session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                        
                            header("location: dashboard.php");
                        } else{
                            
                            $password_err = "Kata Sandi salah!";
                        }
                    }
                } else{
                    // username not exist
                    $username_err = "Oops!Akun tidak ditemukan.";
                }
            
            
        }

        // Close statement
        $stmt->close();
    }

}
    $mysqli->close();

?>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
        .wrapper{position:relative; left: 51px; width: 290px; padding: 20px;text-align: left; }
    </style>
    <div class="wrapper">
        <form method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Kata Sandi</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Login">
            </div>
            <p>Belum punya akun? <a href="register.php">Daftar sekarang</a>.</p>
        </form>
    </div>