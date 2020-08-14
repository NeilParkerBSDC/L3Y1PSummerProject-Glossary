<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Neil's Pages</title>
</head>
<body>

<h1>DR P's Sandbox: The Code you asked for</h1>
<!-- Navigation Bar -->
<?php
include "navbar.php";
?>

<?php
include "connect.php";
// Get data
$task=$_POST["task"];
$language=$_POST["language"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Title Output
// Task Title
$sqltask = "SELECT CTask_tbl.CTasks FROM (Code_Example_tbl INNER JOIN CTask_tbl ON Code_Example_tbl.Example_Task_ID = CTask_tbl.CTask_ID) WHERE Code_Example_tbl.Example_Task_ID=" . $task . ";";
$result = $conn->query($sqltask);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) { 
	$TaskName =$row['CTasks'];
  }
} else {
  echo "0 results";
}

// Language
$sqllang = "SELECT PLanguages_tbl.PLanguage FROM (Code_Example_tbl INNER JOIN PLanguages_tbl ON Code_Example_tbl.Example_Lang_ID = planguages_tbl.PLanguages_ID) WHERE planguages_tbl.PLanguages_ID = " . $language .";";

$result = $conn->query($sqllang);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) { 
	$TaskLang =$row['PLanguage'];
  }
} else {
  echo "0 results";
}
echo "<h2>" . $TaskName . " - " . $TaskLang . "</h2>";

// Main Output
$sqlmain = "SELECT CTask_tbl.CTasks, PLanguages_tbl.PLanguage, Code_Example_tbl.Example_Title, Code_Example_tbl.Interface_Type, Code_Example_tbl.Code_Example, Code_Example_tbl.Example_Annotation, Code_Example_tbl.Link_URL FROM ((Code_Example_tbl INNER JOIN CTask_tbl ON Code_Example_tbl.Example_Task_ID = CTask_tbl.CTask_ID) INNER JOIN PLanguages_tbl ON Code_Example_tbl.Example_Lang_ID = planguages_tbl.PLanguages_ID) WHERE Code_Example_tbl.Example_Task_ID=" . $task ." AND planguages_tbl.PLanguages_ID = " . $language . ";";
$result = $conn->query($sqlmain);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo "<h3>" . $row['Example_Title'] . "</h3>";
	echo "<p><Code>" . $row['Code_Example'] . "</code><p><hr>"; 
	echo "<p>" . $row['Example_Annotation'] . "<p><hr>";
  }
} else {
  echo "0 results";
}

$conn->close();
?>


</body>
</html