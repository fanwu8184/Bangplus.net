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

$sql="UPDATE SUPPLIER SET sup_name='$_POST[name]', sup_address='$_POST[address]', sup_contactinfo='$_POST[contactinfo]' where sup_id='$_POST[id]'";

if (!mysql_query($sql,$con))
   {
   die('Error: ' . mysql_error());
   }
echo "<br><br>One Supplier Updated";
 
mysql_close($con);
echo '<br><br><a href="supplier.php">Go To Suppliers Page</a>';
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?> 
 </html>