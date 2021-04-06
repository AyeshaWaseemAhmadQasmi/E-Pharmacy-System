<?php
error_reporting(0); 
?> 
<?php
include '../Database/connection.php';
$msg = ""; 

// If upload button is clicked ... 
if (isset($_POST['upload']) and (! empty($_POST["PROD_ID"])) and ! empty($_POST["PROD_NAME"])and ! empty($_POST["PROD_PRICE"]) and ! empty($_POST["PROD_MFG"])) { 

    
    $id = mysqli_real_escape_string($conn, $_POST['PROD_ID']); // store id with sql escapes
    $name = mysqli_real_escape_string($conn, $_POST['PROD_NAME']); //store name with sql escapes
    $price = mysqli_real_escape_string($conn, $_POST['PROD_PRICE']); // store type with sql escapes
    $mfg = mysqli_real_escape_string($conn, $_POST['PROD_MFG']); // store price with sql escapes
    $code = mysqli_real_escape_string($conn, $_POST['PROD_CODE']); // store price with sql escapes
    $sql = "DELETE FROM PRODUCTS WHERE PRID = '$id'";
    if ($conn->query($sql) == TRUE) { //if query is succesful
        echo "<br>" . "Data deleted successfully"; // print message
        }
    else {
        echo "<br><br> Error: " . $sql . "<br>" . $conn->error; // print error
        }
 
    
	$filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];

    		 
		$folder = "../productimage/".$filename; 
		


		// Get all the submitted data from the form 
		$sql = "INSERT INTO PRODUCTS (PRID, NAME, CODE, PRICE, IMAGE, MFG) 
        VALUES ('$id','$name','$code','$price','$filename','$mfg')"; 

		// Execute query 
        mysqli_query($conn, $sql); 
        echo "Product added";
        header("Refresh:0");
		// Now let's move the uploaded image into the folder: image 
		if (move_uploaded_file($tempname, $folder)) { 
			$msg = "Product Added successfully"; 
		}else{ 
			$msg = "Failed to upload image"; 
	} 
} 
$result = mysqli_query($conn, "SELECT * FROM PRODUCTS"); 
?> 

<!DOCTYPE html> 
<html> 
<head> 
<title>Product Addition</title> 
<link rel="stylesheet" type= "text/css" href ="style.css"/> 
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
<a class="dropdown-item" href="supdel.php">Delete Supplier</a></div>
</li>
<li><a href="vieworder.php">View Placed orders</a></li>
</ul>
            <ul class="nav navbar-nav navbar-right">
        <li><a href="../logintry/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
<div id="content"> 

<form method="POST" action="" enctype="multipart/form-data"> 
    <input type="file" name="uploadfile" value=""/>
   <br> Product Id: <input type="text" name="PROD_ID" placeholder="Product ID">
   <br> Product Name: <input type="text" name="PROD_NAME" placeholder="Product Name">
   <br> Product Code: <input type="text" name="PROD_CODE" placeholder="Product Code">
   <br> Product Price: <input type="text" name="PROD_PRICE" placeholder="Product Price in Decimals">
   <br> Product Manufacturer <input type="text" name="PROD_MFG" placeholder="Manufacturer Name"> 
    
	<div> 
		<button type="submit" name="upload">Add Product</button> 
		</div> 
</form> 
</div> 


<form action="" method="get">
    <label>Search by ID:</label>
    <input type="text" name="search">
    <input type="submit" value="Search">
</form>

<?php


$sql = "SELECT PRID, NAME, CODE, PRICE, IMAGE, MFG FROM PRODUCTS";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Current Product Information: </h3><br><table><tr><th>ID</th><th>Name</th><th>Code</th><th>Price</th><th>Image</th><th>Manufacturer</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["PRID"]. "</td><td>" . $row["NAME"]. "</td><td>" . $row["CODE"] . "</td><td>" . $row["PRICE"] . "</td><td>" . $row["IMAGE"] . "</td><td>" . $row["MFG"] . "</td></tr>";
    }
    echo "</table><br><br><br>";
} else {
    echo "0 results<br><br><br>";
}



if ($_SERVER["REQUEST_METHOD"]=="GET" and ! empty($_GET["search"])){ // if form method is post
  $searchid = mysqli_real_escape_string($conn, $_REQUEST['search']); // store id with sql escapes
  $sql = "SELECT PRID, NAME, CODE, PRICE, IMAGE, MFG FROM PRODUCTS WHERE PRID = '$searchid'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "<h3>Search Results: </h3><br><table><tr><th>ID</th><th>Name</th><th>Code</th><th>Price</th><th>Image</th><th>Manufacturer</th></tr>";
    // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["PRID"]. "</td><td>" . $row["NAME"]. "</td><td>" . $row["CODE"] . "</td><td>" . $row["PRICE"] . "</td><td>" . $row["IMAGE"] . "</td><td>" . $row["MFG"] . "</td></tr>";
      }
      echo "</table><br><br><br>";
  } else {
      echo "No results found";
  }
}?>

</body> 
</html> 




