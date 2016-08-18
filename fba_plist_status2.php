<html>
<HEAD>
<TITLE>Bangplus Update FBA Purchase List Status</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Update FBA Purchase List Status</font></p></B></H1>

<p align="center">
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

$fpl_id = $_GET['id'];

echo '<a href="fba_plist.php">FBA Purchase List</a><br><br>';

$sql="UPDATE FBA_PLIST SET fpl_status = 1 where fpl_id='$fpl_id'";

   if (!mysql_query($sql,$con))
   {
     die('Error: ' . mysql_error());
   }
   
echo "<br><br>A FBA Purchase List Status Updated";
 
mysql_close($con);
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
 ?> 
 </p>
 
</html> 