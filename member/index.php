<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Login</title>
    <link rel="stylesheet" type="text/css" href="../css/global_styles.css">
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css">
		<link rel="stylesheet" type="text/css" href="css/index_style.css">

</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: ../search.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="cd-form" method="post" name="login">
    <center><legend>Member Login</legend></center>
    <div class="icon">
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
    </div>
    <div class="icon">
        <input type="password" class="login-input" name="password" placeholder="Password"/>
    </div>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p ><a href="../forgotpassword.php" style="text-decoration:none; color:red;">Forgot Password!</a>
        <p align="center">Don't have an account?&nbsp;<a href="registration.php" style="text-decoration:none; color:red;">Register Now!</a>

			<p align="center"><a href="../index.php" style="text-decoration:none;">Go Back</a>
  </form>
<?php
    }
?>
</body>
</html>