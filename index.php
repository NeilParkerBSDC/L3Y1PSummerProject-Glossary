<!DOCTYPE html>
<html>
  <head>
    <title>My CV Webapp</title>
    <link rel="stylesheet" type="text/css" href="MyStyle.css">
  </head>
  <body>
  <h1>My CV</h1>


<h2>My Code Dictionary</h2>
<form action="GetMeCode.php" method="post">
<table border=0 cellpadding=1>
<tr>
<td>What do you want to do?</td>
<td>In what Language?</td>
</tr>
<tr>
<td>
<select name="task"><!-- we can ulimately poplluate this from the database using PHP -->
  <option value=""></option><!-- empty dummy option to stop  inadvertant selection of top item -->
  <option value="Display">Display to Screen</option>
  <option value="Prompt">Prompt for input</option>
  <option value="Vardef">Define a variable</option>
  <option value="Popup">Popup box</option>
</select>
</td>
<td>
<select name="language"><!-- we can ulimately poplluate this from the database using PHP -->
  <option value=""></option><!-- empty dummy option to stop  inadvertant selection of top item -->
  <option value="Python">Python</option>
  <option value="Prompt">JavaScript</option>
  <option value="Vardef">PHP</option>
  <option value="Popup">C#</option>
</select>
</td>
</tr>
</table>
<input type="submit">
</form>


</body>
</html>
