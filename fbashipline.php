<html>
<HEAD>
<TITLE>Bangplus FBA Shipment Line</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: FBA Shipment Line</font></p></B></H1>

<p align="center">
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

$sp_id = $_GET['id'];
$sp_shipmentID = $_GET['id2'];

echo '<a href="storep.php">Store Pay</a> <a href="storei.php">Store Income</a> <a href="storea.php">Store Ads</a><br><br>';
echo '<a href="storep_weight.php">Check Weight</a><br><br>';
echo "<b>FBA Shipment ID: $sp_shipmentID</b><br><br>";
echo '<a href="fbashipline_insert.php?id='.$sp_id.'&id2='.$sp_shipmentID.'">Add a New Record</a><br><br>';

$result = mysql_query("SELECT f.*, pro_price from FBA_SHIPLINE f left join PRODUCT s on f.pro_id = s.pro_id where sp_id = '$sp_id' order by pro_id");
 
echo "<table border='1'>
 <tr>
 <th>Product ID</th>
 <th>Quantity</th>
 <th>Each Price (RMB)</th>
 <th>Total Price (RMB)</th>
 <th>Actions</th>
 </tr>";

 $t_price = 0;

while($row = mysql_fetch_array($result))
   {
   $price = $row['pro_price'] * $row['fba_quantity'];
   $t_price = $t_price + $price;
   
   echo "<tr>";
   echo "<td>" . $row['pro_id'] . "</td>";
   echo "<td>" . $row['fba_quantity'] . "</td>";
   echo "<td>" . $row['pro_price'] . "</td>";
   echo "<td>" . $price . "</td>";
   echo '<td><a href="fbashipline_edit.php?id='.$sp_id.'&id2='.$row['pro_id'].'&id3='.$sp_shipmentID.'">Edit</a> <a href="fbashipline_delete.php?id='.$sp_id.'&id2='.$row['pro_id'].'&id3='.$sp_shipmentID.'">Remove</a></td>';
   echo	"</tr>";
   }
 echo "</table>";
 echo "The total product value is $t_price (RMB)<br>";
 echo '<a href="fbashipline_update.php?id='.$sp_id.'&id2='.$t_price.'&id3='.$sp_shipmentID.'">Update the total product value to Store Pay</a>';

mysql_close($con);
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
 ?> 
 </p>
 
</html> 