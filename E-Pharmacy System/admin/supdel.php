<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
    border: 1px solid black;
}
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
  
  <nav class="top_menu">
    <div class="container">
      <div class="header">
        <a class="website_name" href="index.php">E-Pharmacy System</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Employee Management 
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="empedit.php">Add or Edit Employee Information</a><br>
        <a class="dropdown-item" href="empdel.php">Delete Employee</a></div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Product Management 
        </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="prodins.php">Add or Edit Product Information</a><br>
    <a class="dropdown-item" href="proddel.php">Delete Product</a></div>
</li>
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login Management 
        </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="logsins.php">Add or Edit Login Information</a><br>
    <a class="dropdown-item" href="logsdel.php">Delete Login</a></div>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Supplier Management 
    </a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="supedit.php">Add or Edit Supplier Information</a><br>
<a class="dropdown-item" href="supdel.php">Delete Supplier</a></div></li>
<li><a href="vieworder.php">View Placed orders</a></li>
</ul>
            <ul class="nav navbar-nav navbar-right">
        <li><a href="../logintry/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
  <?php
  include '../Database/connection.php';
  $sql = "SELECT SUPID, SUP_NAME, SUP_ADDRESS, SUP_PHN1 FROM SUP_TABLE";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "<h3>Current Supplier Information: </h3><br><table><tr><th>ID</th><th>Name</th><th>Address</th><th>Phone 1</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["SUPID"]. "</td><td>" . $row["SUP_NAME"]. "</td><td>" . $row["SUP_ADDRESS"] . "</td><td>" . $row["SUP_PHN1"] . "</td></tr>";
      }
      echo "</table>";
  } else {
      echo "0 results";
  }
  ?>
<br><br><br><br>

<form action="" method="get">
    <label>Search by ID:</label>
    <input type="text" name="search">
    <input type="submit" value="Search">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"]=="GET" and ! empty($_GET["search"])){ // if form method is post
  $searchid = mysqli_real_escape_string($conn, $_REQUEST['search']); // store id with sql escapes
  $sql = "SELECT SUPID, SUP_NAME, SUP_ADDRESS, SUP_PHN1 FROM SUP_TABLE WHERE SUPID = '$searchid'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      echo "<h3>Search Results: </h3><br><table><tr><th>ID</th><th>Name</th><th>Address</th><th>Phone 1</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["SUPID"]. "</td><td>" . $row["SUP_NAME"]. "</td><td>" . $row["SUP_ADDRESS"] . "</td><td>" . $row["SUP_PHN1"] . "</td></tr>";
      }
      echo "</table><br><br><br>";
  } else {
      echo "No results found";
  }
}



if ($_SERVER["REQUEST_METHOD"]=="POST"and (! empty($_POST["SUP_ID"]))){ // if form method is post
    $id = mysqli_real_escape_string($conn, $_REQUEST['SUP_ID']); // store id with sql escapes

$sql = "DELETE FROM SUP_TABLE WHERE SUPID = '$id'";
if ($conn->query($sql) == TRUE) { //if query is succesful
    echo "<br>" . "Data deleted successfully"; // print message
    header("Refresh:0");
    }
else {
    echo "<br><br> Error: " . $sql . "<br>" . $conn->error; // print error
    }
}
?>
<form action="" method="post">
    <input type="text" name="SUP_ID" placeholder="Supplier ID">
    <input type="submit" value="Submit">
</form>

</body>
</html>