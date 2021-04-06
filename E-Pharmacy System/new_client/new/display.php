<?php
$sql = "SELECT HID, name, total, created_at FROM History;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "History_ID: " . $row["HID"]. " - Product Name: " . $row["name"]. "  - Total: " . $row["total"].- Time Stamp: " . $row["created_at"]. " "<br>";
  }
} else {
  echo "0 results";
}
?>