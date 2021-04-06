<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Pharmacy System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>        
  .result_table{
    border: 1px solid black;
}
  th, td{} 
</style>
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
    <form class="search_form" action="search.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

<div class="container">

<form action="" method="get">
    <label>Search by ID:</label>
    <input type="text" name="search">
    <input type="submit" value="Search">
</form>

<?php

include '../Database/connection.php';

if ($_SERVER["REQUEST_METHOD"]=="GET" and ! empty($_GET["search"])){ // if form method is post
  $searchid = mysqli_real_escape_string($conn, $_REQUEST['search']); // store id with sql escapes
  $sql = "SELECT * FROM PRODUCTS WHERE NAME = '$searchid'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      echo "<h3>Search Results: </h3><br><table class='result_table'><tr><th class='result_table'>Name</th><th class='result_table'>Price</th><th class='result_table'>Picture</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr><td class='result_table'>" . $row["name"]. "</td><td class='result_table'>" . $row["price"] . "</td><td class='result_table'>" . $row["image"] . "</td></tr>";
      }
      echo "</table><br><br><br>";
  } else {
      echo "No results found";
  }
}?>

<?php
if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true))
  {
  header ("Location: login.php");
}
?>

<?php include 'add_cart.php';?>
<?php include 'shop_cart.php';?>

</div>

</body>
</html>

