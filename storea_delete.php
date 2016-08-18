<html>
<HEAD>
<TITLE>Bangplus: Remove a Store Ads Record</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Remove a Store Ads Record</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="storea.php">Store Ads</a>';

echo '<p align="center"><b>Are you sure you want to REMOVE the following Record:</b><br><br>';

$sa_id = $_GET['id'];
$result = mysql_query("SELECT a.*, fs_name FROM FBA_STORE f, STORE_ADS a where f.fs_id = a.fs_id and a.sa_id = '$sa_id'");
 
echo "<table border='1'>
 <tr>
 <th>Record ID</th>
 <th>Store</th>
 <th>Date</th>
 <th>Cost</th>
 </tr>";
 
while($row = mysql_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $row['sa_id'] . "</td>";
   echo "<td>" . $row['fs_name'] . "</td>";
   echo "<td>" . $row['sa_date'] . "</td>";
   echo "<td>" . $row['sa_cost'] . "</td>";
   echo	"</tr>";
   }
 echo "</table>";
 
mysql_close($con);
 ?> 
 
<form action="storea_delete2.php" method="post">
<input type="radio" name="confirm" value="Y">Yes!
<input type="radio" name="confirm" value="N">No!
<input type="hidden" name="sa_id" value="<?php echo $sa_id ?>">
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