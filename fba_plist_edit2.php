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

$sql="UPDATE FBA_PLIST SET fs_id='$_POST[fs_id]', pro_id='$_POST[pro_id]', fpl_quantity='$_POST[fpl_quantity]', fpl_createdate='$_POST[fpl_createdate]' where fpl_id = '$_POST[fpl_id]'";

if (!mysql_query($sql,$con))
   {
   die('Error: ' . mysql_error());
   }
echo "<br><br>One FBA Purchase Record Updated";
 
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