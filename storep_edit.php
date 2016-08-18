<html>
<HEAD>
<TITLE>Bangplus Edit a Record of Store Pay</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Edit a Record of Store Pay</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="storep.php">Store Pay</a>';

$sp_id = $_GET['id'];
$result = mysql_query("SELECT p.*, fs_name FROM FBA_STORE f, STORE_PAY p where f.fs_id = p.fs_id and p.sp_id = '$sp_id'");
$row = mysql_fetch_array($result);

$fs_id = $row['fs_id'];
$fs_name = $row['fs_name'];
$sp_shipdate = $row['sp_shipdate'];
$sp_carrier = $row['sp_carrier'];
$sp_tracking = $row['sp_tracking'];
$sp_shipmentID = $row['sp_shipmentID'];
$sp_shipweight = $row['sp_shipweight'];
$sp_shippingcost = $row['sp_shippingcost'];
$sp_productvalue = $row['sp_productvalue'];
?>

<form action="storep_edit2.php" method="post">
<input type="hidden" name="sp_id" value="<?php echo $sp_id ?>">
 Store:<br><select name="fs_id">
 <option value="<?php echo $fs_id; ?>"><?php echo $fs_name; ?></option>
 <?php
 $result = mysql_query("SELECT * FROM FBA_STORE order by fs_name");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["fs_id"].'">'.$row["fs_name"].'</option>';
   }
 ?>
 </select><br>
 Ship Date:<br><font color="red">Please enter a date as the fololwing format: yyyy/mm/dd</font><br><input type="text" name="sp_shipdate" value="<?php echo $sp_shipdate; ?>"><br>
 Carrier:<br><input type="text" name="sp_carrier" value="<?php echo $sp_carrier; ?>"><br>
 Tracking Number:<br><input type="text" name="sp_tracking" value="<?php echo $sp_tracking; ?>"><br>
 FBA Shipment ID:<br><input type="text" name="sp_shipmentID" value="<?php echo $sp_shipmentID; ?>"><br>
 Shipment Weight (KG):<br><input type="text" name="sp_shipweight" value="<?php echo $sp_shipweight; ?>"><br>
 Shipping Cost (RMB):<br><input type="text" name="sp_shippingcost" value="<?php echo $sp_shippingcost; ?>"><br>
 Product Value (RMB):<br><input type="text" name="sp_productvalue" value="<?php echo $sp_productvalue; ?>"><br><br>
 <input type="submit" value="Update">
 </form>
 
 <?php
 }
 else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?>
 </html>