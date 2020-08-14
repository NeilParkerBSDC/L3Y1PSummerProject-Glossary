<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Neil's Pages</title>
</head>
<body>

<h1>DR P's Sandbox: News</h1>
<!-- Navigation Bar -->
<?php
include "navbar.php";
?>

<?php
include "connect.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Task dropdown box
$sql = "SELECT * FROM `news_tbl` WHERE `news_status`='Active' ORDER BY `news_date` DESC;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	//echo "<a href='". $row['Filename'] ."'>". $row['PageName'] ."&nbsp;</a>";
	echo "<h2>" . $row['news_date'] . "&nbsp;-&nbsp;" . $row['news_title'] . "</h2>";
	echo "<P><strong><em>" . $row['News_summary'] . "</em></strong></P>"; 
	echo "<p>" . $row['news_details'] . "<p><hr>"; 
  }
} else {
  echo "0 results";
}

$conn->close();
?>


</body>
</html