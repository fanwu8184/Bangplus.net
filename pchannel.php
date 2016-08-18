<html>
<HEAD>
<TITLE>Bangplus Channels</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Channels</font></p></B></H1>

<p align="center">
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="pchan_insert.php">Add a New Record</a><br><br>';
$exchangerate = 6.0;
$dhlrate = 38;
$calfactor = 1.2;

$result = mysql_query("SELECT pc.*, chan_name, pro_price, pro_weight, pro_vweight FROM PRO_CHAN pc, CHANNEL c, PRODUCT p where pc.chan_id = c.chan_id and pc.pro_id = p.pro_id order by p.pro_id, chan_name");
 
echo "<table border='1'>
 <tr>
 <th>Product ID</th>
 <th>Channel</th>
 <th>Product Cost</th>
 <th>Shipping Cost</th>
 <th>Fee (%)</th>
 <th>FBA fee</th>
 <th>Tocal Cost</th>
 <th>Sale Price</th>
 <th>Net Profit</th>
 <th>Sale Profit Rate(%)</th>
 <th>Cost Profit Rate(%)</th>
 <th>Actions</th>
 </tr>";
 
echo "<b>Exchange Rate: $exchangerate, DHL Shipping Rate: $dhlrate (RMB), Weight calculate factor: $calfactor</b><br>";

while($row = mysql_fetch_array($result))
   {
   if ($row['pro_weight'] >= $row['pro_vweight'])
   {
     $actualw = $row['pro_weight'];
   }
   else
   {
     $actualw = $row['pro_vweight'];
   }
   $shippingcost = $actualw * $calfactor * $dhlrate / 1000 / $exchangerate;
   
   $cost = $row['pro_price'] / $exchangerate;
   $totalcost = $cost + $shippingcost + $row['pc_saleprice'] * $row['pc_percentfee'] / 100 + $row['pc_FBAfee'];
   $netincome = $row['pc_saleprice'] - $totalcost;
   $spr = $netincome / $row['pc_saleprice'] * 100;
   $cpr = $netincome / $totalcost * 100;
   
   echo "<tr>";
   echo "<td>" . $row['pro_id'] . "</td>";
   echo "<td>" . $row['chan_name'] . "</td>";
   echo "<td>" . $cost . "</td>";
   echo "<td>" . $shippingcost . "</td>";
   echo "<td>" . $row['pc_percentfee'] . "</td>";
   echo "<td>" . $row['pc_FBAfee'] . "</td>";
   echo "<td>" . $totalcost . "</td>";
   echo "<td>" . $row['pc_saleprice'] . "</td>";
   echo "<td>" . $netincome . "</td>";
   echo "<td>" . $spr . "</td>";
   echo "<td>" . $cpr . "</td>";
   echo '<td><a href="pchan_edit.php?id='.$row['pro_id'].'&id2='.$row['chan_id'].'">Edit</a> <a href="pchan_delete.php?id='.$row['pro_id'].'&id2='.$row['chan_id'].'">Remove</a></td>';
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