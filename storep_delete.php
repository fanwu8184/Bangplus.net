<html>
<HEAD>
<TITLE>Bangplus: Remove a Store Pay Record</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Remove a Store Pay Record</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="storep.php">Store Pay</a>';

echo '<p align="center"><b>Are you sure you want to REMOVE the following Record:</b><br><br>';

$sp_id = $_GET['id'];
$result = mysql_query("SELECT p.*, fs_name FROM FBA_STORE f, STORE_PAY p where f.fs_id = p.fs_id and p.sp_id = '$sp_id'");
 
echo "<table border='1'>
 <tr>
 <th>Record ID</th>
 <th>Store</th>
 <th>Ship Date</th>
 <th>Carrier</th>
 <th>Tracking Number</th>
 <th>FBA Shipment ID</th>
 <th>Shipment Weight (KG)</th>
 <th>Shipping Cost (RMB)</th>
 <th>Product Value (RMB)</th>
 </tr>";
 
while($row = mysql_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $row['sp_id'] . "</td>";
   echo "<td>" . $row['fs_name'] . "</td>";
   echo "<td>" . $row['sp_shipdate'] . "</td>";
   echo "<td>" . $row['sp_carrier'] . "</td>";
   echo "<td>" . $row['sp_tracking'] . "</td>";
   echo "<td>" . $row['sp_shipmentID'] . "</td>";
   echo "<td>" . $row['sp_shipweight'] . "</td>";
   echo "<td>" . $row['sp_shippingcost'] . "</td>";
   echo "<td>" . $row['sp_productvalue'] . "</td>";
   echo	"</tr>";
   }
 echo "</table>";
 
mysql_close($con);
 ?> 
 
<form action="storep_delete2.php" method="post">
<input type="radio" name="confirm" value="Y">Yes!
<input type="radio" name="confirm" value="N">No!
<input type="hidden" name="sp_id" value="<?php echo $sp_id ?>">
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