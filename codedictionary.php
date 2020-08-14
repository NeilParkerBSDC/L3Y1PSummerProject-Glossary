<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Neil's Pages</title>
</head>
<body>

<h1>DR P's Sandbox: Code Dictionary</h1>

<!-- Navigation Bar -->
<?php include "navbar.php"; ?>
<br/>&nbsp;<br/>

<!-- Form -->
<div class="form">
<form action="GetMeCode.php" method="post">

<?php

include "connect.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Task dropdown box
$sqltasks = "SELECT * FROM CTask_tbl";
$result = $conn->query($sqltasks);

echo "<h2>What do you want to be able to do?</h2>";
echo "<select name='task' class='dropdown'><option value=''></option>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo "<option value='" . $row['CTask_ID'] . "'>" . $row['CTasks']."</option>";
  }
} else {
  echo "0 results";
}
echo "</select><br/>";

// Languages dropdown box

$sqllangs = "SELECT * FROM PLanguages_tbl";
$result = $conn->query($sqllangs);

echo "<h2>What language do you want to be able to do it in?</h2>";
echo "<select name='language' class='dropdown'><option value=''></option>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo "<option value='". $row['PLanguages_ID'] ."'>" . $row['PLanguage']."</option>";
  }
} else {
  echo "0 results";
}
echo "</select><br/>";

$conn->close();
?>
<br/>&nbsp;<br/>
<input type="submit" class="submitbutton">
<br/>&nbsp;<br/>
</form>
</div>


</body>
</html>