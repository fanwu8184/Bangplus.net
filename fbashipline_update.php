<html>
<HEAD>
<TITLE>Bangplus Update Store Pay</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Update Store Pay</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

$sp_id = $_GET['id'];
$t_price = $_GET['id2'];
$sp_shipmentID = $_GET['id3'];

echo '<p align="center"><a href="fbashipline.php?id='.$sp_id.'&id2='.$sp_shipmentID.'">FBA Shipment Line</a></p>';
echo '<p align="center">';
echo "<b>FBA Shipment ID: </b> $sp_shipmentID</p>";
?>

<form action="fbashipline_update2.php" method="post">
<input type="hidden" name="sp_id" value="<?php echo $sp_id ?>">
<input type="hidden" name="sp_shipmentID" value="<?php echo $sp_shipmentID ?>">
 Product Value:<br><input type="text" name="sp_productvalue" value="<?php echo $t_price; ?>">
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