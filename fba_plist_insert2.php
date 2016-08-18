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

$sql="INSERT INTO FBA_PLIST (fs_id, pro_id, fpl_quantity, fpl_createdate)
 VALUES
 ('$_POST[fs_id]','$_POST[pro_id]','$_POST[fpl_quantity]','$_POST[fpl_createdate]')";
 
if (!mysql_query($sql,$con))
   {
   die('Error: ' . mysql_error());
   }
 echo "<br><br>One FBA Purchase Record Added";
 
mysql_close($con);
 ?> 

<br><br><a href="fba_plist.php">FBA Purchase List</a>

<?php
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?>
 </html>