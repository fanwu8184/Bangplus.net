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

echo '<a href="storei.php">Store Income</a>';


$sql="INSERT INTO STORE_INCOME (fs_id, si_date, si_income)
 VALUES
 ('$_POST[fs_id]','$_POST[si_date]','$_POST[si_income]')";
 
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