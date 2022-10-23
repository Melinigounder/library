<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/global_styles.css">
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css">
		<link rel="stylesheet" type="text/css" href="css/index_style.css">
</head>
<body>
<?php
    require('db.php');
   
    if (isset($_REQUEST['username'])) {
        
        $username = stripslashes($_REQUEST['username']);
       
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="cd-form" action="" method="post">
    <center><legend>Member Registration</legend><p>Please fillup the form below:</p></center>
    <div class="icon">
        <input type="text" class="login-input" name="username" placeholder="Username" required />
    </div>
    <div class="icon">
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
    </div>
    <div class="icon">
        <input type="password" class="login-input" name="password" placeholder="Password">
    </div>
    <br />
        <input type="submit" name="submit" value="Register" class="login-button">

        <p align="center">Already Registerd?&nbsp;<a href="index.php" style="text-decoration:none; color:red;">Login Here!</a>
        <p align="center"><a href="../index.php" style="text-decoration:none;">Go Back</a>

    </form>
<?php
    }
?>
</body>
</html>