<html>
  <head>
    <style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>

<body>
  
<?php
include "../Database/connection.php";
$sql = "SELECT history.name, history.quantity, history.created_at FROM history";
  $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<h3>History Information: </h3><br><table><tr><th>Name</th><th>Quantity</th><th>TimeStamp</th></tr>";

  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["created_at"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
?>

</body>

</html>