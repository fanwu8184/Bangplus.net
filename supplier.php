<html>
<HEAD>
<TITLE>Bangplus Suppliers</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Suppliers</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<p align="center"><a href="sup_insert.php">Add a New Supplier</a><br><br>';

if(isset($_GET['id']))
{
  $sup_id = $_GET['id'];
  $result = mysql_query("SELECT * FROM SUPPLIER where sup_id = '$sup_id'");
}
else
{
  $result = mysql_query("SELECT * FROM SUPPLIER order by sup_name");
} 

echo "<table border='1'>
 <tr>
 <th>Name</th>
 <th>Adress</th>
 <th>Contact Info.</th>
 <th>Actions</th>
 </tr>";
 
while($row = mysql_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $row['sup_name'] . "</td>";
   echo "<td>" . $row['sup_address'] . "</td>";
   echo "<td>" . $row['sup_contactinfo'] . "</td>";
   echo '<td><a href="sup_edit.php?id='.$row['sup_id'].'">Edit</a> <a href="sup_delete.php?id='.$row['sup_id'].'">Remove</a></td>';
   echo	"</tr>";
   }
 echo "</table>";
 
mysql_close($con);
echo '</p>';
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?> 
</html> 