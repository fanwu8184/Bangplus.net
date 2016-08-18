<html>
<HEAD>
<TITLE>Bangplus Store Pay</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Store Pay</font></p></B></H1>

<p align="center">
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="storep.php">Store Pay</a> <a href="storei.php">Store Income</a> <a href="storea.php">Store Ads</a><br><br>';
echo '<a href="storep_weight.php">Check Weight</a><br><br>';
echo '<a href="storep_insert.php">Add a New Record</a>';

?>
<form action="storep_store.php" method="post">
 Store:<br><select name="fs_id">
 <option value=""></option>
 <?php
 $result = mysql_query("SELECT * FROM FBA_STORE order by fs_name");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["fs_id"].'">'.$row["fs_name"].'</option>';
   }
 ?>
 </select>
 <input type="submit" value="Submit">
 </form>
<?php

$result = mysql_query("SELECT p.*, fs_name FROM FBA_STORE f, STORE_PAY p where f.fs_id = p.fs_id order by sp_id DESC LIMIT 500");

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
 <th>Actions</th>
 </tr>";
 
while($row = mysql_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $row['sp_id'] . "</td>";
   echo "<td>" . $row['fs_name'] . "</td>";
   echo "<td>" . $row['sp_shipdate'] . "</td>";
   echo "<td>" . $row['sp_carrier'] . "</td>";
   echo "<td>" . $row['sp_tracking'] . "</td>";
   echo '<td><a href="fbashipline.php?id='.$row['sp_id'].'&id2='.$row['sp_shipmentID'].'">'.$row['sp_shipmentID'].'</a></td>';
   echo "<td>" . $row['sp_shipweight'] . "</td>";
   echo "<td>" . $row['sp_shippingcost'] . "</td>";
   echo "<td>" . $row['sp_productvalue'] . "</td>";
   echo '<td><a href="storep_edit.php?id='.$row['sp_id'].'">Edit</a> <a href="storep_delete.php?id='.$row['sp_id'].'">Remove</a></td>';
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