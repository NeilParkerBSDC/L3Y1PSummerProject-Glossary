<?php
include "connect.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Task dropdown box
$sql = "SELECT * FROM `pages_tbl` WHERE `Status`<>'Not Started';";
$result = $conn->query($sql);
echo "<div class='topnav' id='myTopnav'>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo "<a href='". $row['Filename'] ."'>". $row['PageName'] ."&nbsp;</a>";
  }
} else {
  echo "0 results";
}
echo "</div>";

$conn->close();
?>