<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Neil's Pages</title>
</head>
<body>

<h1>DR P's Sandbox</h1>
<!-- Navigation Bar -->
<?php
include "navbar.php";
?>
<h2>What  do you want to do?</h2>

<div class="panel">
<P>These pages have been created as a learning resource for you to use (please see the links below). 
However, because they were created using technologies that you should be familiar with, 
I have placed the source code onto Github, so that you can create your own version. (<a href="https://github.com/NeilParkerBSDC/L3Y1PSummerProject-Glossary" target="_blank">link here</a>)</p>
<br/>
<form action="getcode.php" method="post">
<input type="submit" value="Use the code dictionary" class="submitbutton">
</form>
&nbsp;<br/>
<form action="glossary.php" method="post">
<input type="submit" value="Use the Glossary" class="submitbutton">&nbsp;
<span style="background-color: yellow; color: red;">not yet created</span> 
</form>
<br/>&nbsp;<br/>
</div>


</body>
</html