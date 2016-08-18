<html>
<HEAD>
<TITLE>Bangplus Store Ads</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Store Ads</font></p></B></H1>

<p align="center">
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="storep.php">Store Pay</a> <a href="storei.php">Store Income</a> <a href="storea.php">Store Ads</a><br><br>';
echo '<a href="storea_insert.php">Add a New Record</a><br><br>';

$result = mysql_query("SELECT a.*, fs_name FROM FBA_STORE f, STORE_ADS a where f.fs_id = a.fs_id order by sa_id DESC LIMIT 100");

echo "<table border='1'>
 <tr>
 <th>Record ID</th>
 <th>Store</th>
 <th>Date</th>
 <th>Cost (RMB)</th>
 <th>Actions</th>
 </tr>";
 
while($row = mysql_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $row['sa_id'] . "</td>";
   echo "<td>" . $row['fs_name'] . "</td>";
   echo "<td>" . $row['sa_date'] . "</td>";
   echo "<td>" . $row['sa_cost'] . "</td>";
   echo '<td><a href="storea_edit.php?id='.$row['sa_id'].'">Edit</a> <a href="storea_delete.php?id='.$row['sa_id'].'">Remove</a></td>';
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