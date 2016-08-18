<html>
<HEAD>
<TITLE>Bangplus: Remove a FBA Shipment Line Record</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Remove a FBA Shipment Line Record</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');

$sp_id = $_GET['id'];
$pro_id = $_GET['id2'];
$sp_shipmentID = $_GET['id3'];

echo '<p align="center"><a href="fbashipline.php?id='.$sp_id.'&id2='.$sp_shipmentID.'">FBA Shipment Line</a> <br><br><b>Are you sure you want to REMOVE the following Record:</b><br><br>';

echo "<b>FBA Shipment ID: </b> $sp_shipmentID <b>Product ID: </b>$pro_id</p>";
 ?> 
 
<form action="fbashipline_delete2.php" method="post">
<input type="radio" name="confirm" value="Y">Yes!
<input type="radio" name="confirm" value="N">No!
<input type="hidden" name="sp_id" value="<?php echo $sp_id ?>">
<input type="hidden" name="pro_id" value="<?php echo $pro_id ?>">
<input type="hidden" name="sp_shipmentID" value="<?php echo $sp_shipmentID ?>">
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