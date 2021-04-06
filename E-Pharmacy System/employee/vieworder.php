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
  <form action="" method="get">
    <label>Search by Product Name:</label>
    <input type="text" name="search">
    <input type="submit" value="Search">
</form>

<?php
 include "../Database/connection.php";
if ($_SERVER["REQUEST_METHOD"]=="GET" and ! empty($_GET["search"])){ // if form method is post
  $searchid = mysqli_real_escape_string($conn, $_REQUEST['search']); // store id with sql escapes
  $sql = "SELECT history.name, history.quantity, products.MFG FROM history INNER JOIN products ON history.name = products.NAME WHERE history.name = '$searchid'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      echo "<h3>Current Order Information: </h3><br><table><tr><th>Name</th><th>Quantity</th><th>Manufacuter</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["MFG"] . "</td></tr>";      }
      echo "</table><br><br><br>";
  } else {
      echo "No results found";
  }
}

    
        $sql = "SELECT history.name, history.quantity, products.MFG FROM history INNER JOIN products ON history.name = products.NAME";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h3>Current Order Information: </h3><br><table><tr><th>Name</th><th>Quantity</th><th>Manufacuter</th></tr>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["name"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["MFG"] . "</td></tr>";
              }
              echo "</table>";
          } else {
              echo "0 results";
          }
    
    ?>



    </form>
</body>
</html>