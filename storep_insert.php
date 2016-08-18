<html>
<HEAD>
<TITLE>Bangplus Add a New Record for Store Pay</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Add a New Record for Store Pay</font></p></B></H1>
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

?>
<p align="center"><a href="storep.php">Store Pay</a></p>

<form action="storep_insert2.php" method="post">
 Store:<br><select name="fs_id">
 <option value="">---</option>
 <?php
 $result = mysql_query("SELECT * FROM FBA_STORE order by fs_name");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["fs_id"].'">'.$row["fs_name"].'</option>';
   }
 ?>
 </select><br>
 Ship Date:<br><font color="red">Please enter a date as the fololwing format: yyyy/mm/dd</font><br><input type="text" name="sp_shipdate"><br>
 Carrier:<br><input type="text" name="sp_carrier"><br>
 Tracking Number:<br><input type="text" name="sp_tracking"><br>
 FBA Shipment ID:<br><input type="text" name="sp_shipmentID"><br>
 Shipment Weight (KG):<br><input type="text" name="sp_shipweight"><br>
 Shipping Cost (RMB):<br><input type="text" name="sp_shippingcost"><br>
 Product Value (RMB):<br><input type="text" name="sp_productvalue"><br><br>
 <input type="submit" value="Add">
 </form>
<?php
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?>
 </html>