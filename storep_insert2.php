<html>
<HEAD>
<TITLE>Bangplus</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="storep.php">Store Pay</a>';


$sql="INSERT INTO STORE_PAY (fs_id, sp_shipdate, sp_carrier, sp_tracking, sp_shipmentID, sp_shipweight, sp_shippingcost, sp_productvalue)
 VALUES
 ('$_POST[fs_id]','$_POST[sp_shipdate]','$_POST[sp_carrier]','$_POST[sp_tracking]','$_POST[sp_shipmentID]','$_POST[sp_shipweight]','$_POST[sp_shippingcost]','$_POST[sp_productvalue]')";
 
if (!mysql_query($sql,$con))
   {
   die('Error: ' . mysql_error());
   }
 echo "<br><br>One Record Added";
 
mysql_close($con);
 ?> 

<?php
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?>
 </html>