<html>
<HEAD>
<TITLE>Bangplus Edit a FBA Shipment Line Record</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Edit a FBA Shipment Line Record</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

$sp_id = $_GET['id'];
$pro_id = $_GET['id2'];
$sp_shipmentID = $_GET['id3'];

echo '<p align="center"><a href="fbashipline.php?id='.$sp_id.'&id2='.$sp_shipmentID.'">FBA Shipment Line</a></p>';

echo '<p align="center">';
echo "<b>FBA Shipment ID: </b> $sp_shipmentID <b>Product ID: </b>$pro_id</p>";

$result = mysql_query("SELECT * FROM FBA_SHIPLINE where sp_id = '$sp_id' and pro_id = '$pro_id'");
$row = mysql_fetch_array($result);

$fba_quantity = $row['fba_quantity'];
?>

<form action="fbashipline_edit2.php" method="post">
 <input type="hidden" name="sp_id" value="<?php echo $sp_id ?>">
 <input type="hidden" name="pro_id" value="<?php echo $pro_id ?>">
 <input type="hidden" name="sp_shipmentID" value="<?php echo $sp_shipmentID ?>">
 Quantity:<br><input type="text" name="fba_quantity" value="<?php echo $fba_quantity; ?>"><br><br>
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