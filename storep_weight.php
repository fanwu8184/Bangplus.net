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

$calfactor = 1.2;

echo '<a href="storep.php">Store Pay</a> <a href="storei.php">Store Income</a> <a href="storea.php">Store Ads</a><br><br>';
echo "<b>Calculate factor is $calfactor</b><br><br>";

$result = mysql_query("SELECT s.sp_id, sp_carrier, sp_tracking, sp_shipmentID, sp_shipweight, weight, vweight 
from (select sp_id, sum(pro_weight*fba_quantity/1000) weight, sum(pro_vweight*fba_quantity/1000) vweight from FBA_SHIPLINE f, PRODUCT p where f.pro_id = p.pro_id group by sp_id) e, STORE_PAY s 
where e.sp_id = s.sp_id order by s.sp_id DESC LIMIT 100");

echo "<table border='1'>
 <tr>
 <th>Carrier</th>
 <th>Tracking number</th>
 <th>FBA Shipment ID</th>
 <th>Shipment Weight (KG)</th>
 <th>Calculate Weight (KG)</th>
 <th>Calculate Vweight (KG)</th>
 </tr>";
 
while($row = mysql_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $row['sp_carrier'] . "</td>";
   echo "<td>" . $row['sp_tracking'] . "</td>";
   echo '<td><a href="fbashipline.php?id='.$row['sp_id'].'&id2='.$row['sp_shipmentID'].'">'.$row['sp_shipmentID'].'</a></td>';
   echo "<td>" . $row['sp_shipweight'] . "</td>";
   echo "<td>" . $row['weight']*$calfactor . "</td>";
   echo "<td>" . $row['vweight']*$calfactor . "</td>";
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