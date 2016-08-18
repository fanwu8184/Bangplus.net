<html>
<HEAD>
<TITLE>Bangplus: Categoty</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Categoty</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<p align="center"><a href="cat_insert.php">Add a New Category</a><br><br>';

$result = mysql_query("SELECT * FROM CATEGORY order by cat_name");

echo "<table border='1'>
 <tr>
 <th>Categoty</th>
 <th>Actions</th>
 </tr>";
 
while($row = mysql_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $row['cat_name'] . "</td>";
   echo '<td><a href="cat_edit.php?id='.$row['cat_id'].'">Edit</a> <a href="cat_delete.php?id='.$row['cat_id'].'">Remove</a></td>';
   echo	"</tr>";
   }
 echo "</table>";
 
mysql_close($con);
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?> 
 
</p>
</html> 