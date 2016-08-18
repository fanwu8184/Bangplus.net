<html>
<HEAD>
<TITLE>Bangplus: Remove a Store Income Record</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Remove a Store Income Record</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="storei.php">Store Income</a>';

echo '<p align="center"><b>Are you sure you want to REMOVE the following Record:</b><br><br>';

$si_id = $_GET['id'];
$result = mysql_query("SELECT i.*, fs_name FROM FBA_STORE f, STORE_INCOME i where f.fs_id = i.fs_id and p.si_id = '$si_id'");
 
echo "<table border='1'>
 <tr>
 <th>Record ID</th>
 <th>Store</th>
 <th>Income Date</th>
 <th>Income Value (RMB)</th>
 </tr>";
 
while($row = mysql_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $row['sp_id'] . "</td>";
   echo "<td>" . $row['fs_name'] . "</td>";
   echo "<td>" . $row['si_date'] . "</td>";
   echo "<td>" . $row['si_income'] . "</td>";
   echo	"</tr>";
   }
 echo "</table>";
 
mysql_close($con);
 ?> 
 
<form action="storei_delete2.php" method="post">
<input type="radio" name="confirm" value="Y">Yes!
<input type="radio" name="confirm" value="N">No!
<input type="hidden" name="si_id" value="<?php echo $si_id ?>">
<input type="submit" value="Sumbit">
</form>
</p>
<?php
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
 ?> 
</html>