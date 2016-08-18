<html>
<HEAD>
<TITLE>Bangplus Add a FBA Shipment Line Record</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Add a FBA Shipment Line Record</font></p></B></H1>
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

$sp_id = $_GET['id'];
$sp_shipmentID = $_GET['id2'];

echo '<p align="center"><a href="fbashipline.php?id='.$sp_id.'&id2='.$sp_shipmentID.'">FBA Shipment Line</a></p>';
echo '<B><p align="center">';
echo "FBA Shipment ID: $sp_shipmentID</p></B>";
?>

<form action="fbashipline_insert2.php" method="post">
<input type="hidden" name="sp_id" value="<?php echo $sp_id ?>">
<input type="hidden" name="sp_shipmentID" value="<?php echo $sp_shipmentID ?>">
Product ID:<br><select name="pro_id">
 <option value=""></option>
 <?php
 $result = mysql_query("SELECT * FROM PRODUCT order by pro_id");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["pro_id"].'">'.$row["pro_id"].'</option>';
   }
 ?>
 </select><br>
Quantity:<br><input type="text" name="fba_quantity"><br>
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