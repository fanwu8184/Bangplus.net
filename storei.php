<html>
<HEAD>
<TITLE>Bangplus Store Income</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Store Income</font></p></B></H1>

<p align="center">
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="storep.php">Store Pay</a> <a href="storei.php">Store Income</a> <a href="storea.php">Store Ads</a><br><br>';

$result = mysql_query("SELECT i.*, fs_name FROM FBA_STORE f, STORE_INCOME i where f.fs_id = i.fs_id order by si_id DESC LIMIT 100");

echo '<a href="storei_insert.php">Add a New Record</a><br><br>';

echo "<table border='1'>
 <tr>
 <th>Record ID</th>
 <th>Store</th>
 <th>Income Date</th>
 <th>Income Value (RMB)</th>
 <th>Actions</th>
 </tr>";
 
while($row = mysql_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $row['si_id'] . "</td>";
   echo "<td>" . $row['fs_name'] . "</td>";
   echo "<td>" . $row['si_date'] . "</td>";
   echo "<td>" . $row['si_income'] . "</td>";
   echo '<td><a href="storei_edit.php?id='.$row['si_id'].'">Edit</a> <a href="storei_delete.php?id='.$row['si_id'].'">Remove</a></td>';
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
 
</html>