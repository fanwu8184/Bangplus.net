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

$sql="INSERT INTO FBA_SHIPLINE (sp_id, pro_id, fba_quantity)
 VALUES
 ('$_POST[sp_id]', '$pro_id', '$_POST[fba_quantity]')";
 
if (!mysql_query($sql,$con))
   {
   die('Error: ' . mysql_error());
   }
 echo "<br><br>One Record Added";
 
mysql_close($con);
 

echo '<br><br><a href="fbashipline.php?id='.$_POST[sp_id].'&id2='.$_POST[sp_shipmentID].'">FBA Shipment Line</a>';


}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?>
 </html>