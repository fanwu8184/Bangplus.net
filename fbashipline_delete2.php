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

$confirm = $_POST['confirm'];

if ($confirm == 'Y')
{
  require_once ('conmysql.php');
  $sql="delete from FBA_SHIPLINE where sp_id = '$sp_id' and pro_id='$pro_id'";
 
  if (!mysql_query($sql,$con))
     {
     die('Error: ' . mysql_error());
     }
  echo "<br><br>One Record Deleted";

  mysql_close($con);
}
else
{
  echo "<br><br>No Record Deleted";
}

echo '<br><br><a href="fbashipline.php?id='.$_POST[sp_id].'&id2='.$_POST[sp_shipmentID].'">FBA Shipment Line</a>';
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
 ?> 

 </html>