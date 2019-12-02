<?php
      // Include config file
      require_once "config.php";
      $_error="Oops! Ada masalah, Silahkan coba kembali.";
      // Define variables and initialize with empty values
      $username = $password = $confirm_password = "";
      $username_err = $password_err = $confirm_password_err = "";
      // Processing form data when form is submitted
      if($_SERVER["REQUEST_METHOD"] == "POST"){

      // Validate username
      if(empty(trim($_POST["username"]))){
        $username_err = "Silahkan Isi username!";
      } else{
      		// Prepare a select statement
      		$query = "SELECT id FROM users WHERE username = ?";

      		if($stmt = $mysqli->prepare($query)){
      				// Bind variables to the prepared statement as parameters
      				$stmt->bind_param("s", $param_username);

      				// Set parameters
      				$param_username = trim($_POST["username"]);

      				// Attempt to execute the prepared statement
      				if($stmt->execute()){
      						// store result
      						$stmt->store_result();

      						if($stmt->num_rows == 1){
      								$username_err = "Username sudah dipakai.";
      						} else{
      								$username = trim($_POST["username"]);
      						}
      				} else{
      						echo $_error;
      				}
      		}

      		// Close statement
      		$stmt->close();
      }

      // Validate password
      if(empty(trim($_POST["password"]))){
      		$password_err = "Silahkan masukkan kata sandi.";
      } elseif(strlen(trim($_POST["password"])) < 5){
      		$password_err = "Kata sandi harus 5 karakter atau lebih!";
      } else{
      		$password = trim($_POST["password"]);
      }

      // Validate confirm password
      if(empty(trim($_POST["confirm_password"]))){
      		$confirm_password_err = "Masukkan kata sandi kembali!";
      } else{
      		$confirm_password = trim($_POST["confirm_password"]);
      		if(empty($password_err) && ($password != $confirm_password)){
      				$confirm_password_err = "Kata sandi tidak cocok!";
      		}
      }

      // Check input errors before inserting in database
      if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

      		// Prepare an insert statement
      		$query = "INSERT INTO users (username, password) VALUES (?, ?)";

      		if($stmt = $mysqli->prepare($query)){
      				// Bind variables to the prepared statement as parameters
      				$stmt->bind_param("ss", $param_username, $param_password);

      				// Set parameters
      				$param_username = $username;
      				$param_password = md5($password);           /*]
                              password_hash($password, PASSWORD_DEFAULT);   ]  Creates a password hash*/

      				// Attempt to execute the prepared statement
      				if($stmt->execute()){
      						// Redirect to login page
      						header("location: index.php");
      				} else{
      						// echo mysqli_error($mysqli);
      				}
      		}

      		// Close statement
      		$stmt->close();
      }

      // Close connection
      $mysqli->close();
      }
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
        .wrapper{background: #d9e3ff4a;color: whitesmoke;border-radius: 7px; width: 350px; padding: 20px; max-width: 360px; margin: 100px auto 16px;}
    </style>
</head>
<body style="background-image:url(images/img_bg_2.jpg);background-size: cover;">
<div class="wrapper">
<h2>Sign Up</h2>
      <p>Silahkan mengisi form untuk mendaftar :)</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                              <label>Username</label>
                              <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                              <span class="help-block"><?php echo $username_err; ?></span>
                  </div>
                  <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                              <label>Kata Sandi</label>
                              <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                              <span class="help-block"><?php echo $password_err; ?></span>
                  </div>
                  <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                              <label>Konfirmasi </label>
                              <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                              <span class="help-block"><?php echo $confirm_password_err; ?></span>
                  </div>
                  <div class="form-group">
                              <input type="submit" class="btn btn-primary" value="Submit">


                  </div>
      </form>
</div>
