<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="top_menu">
  <div class="container">
    <div class="header">
      <a class="website_name" href="#">E-Pharmacy System</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li><a href="contact.html">Contact us</a></li>
      <li><a href="about.html">About</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right"> 
      <li><a href="reset-password.php"><span class="glyphicon glyphicon-lock"></span> Reset Password</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sign out</a></li>
    </ul>
  </div>
</nav>

    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b>. Welcome to our site.</h1>
        <p>Your previous purchases are listed down</p>
        <?php "display.php"; ?>
    </div>
</body>
</html>