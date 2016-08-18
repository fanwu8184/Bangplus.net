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
 
$sql="INSERT INTO PRO_CHAN (pro_id, chan_id, pc_percentfee, pc_FBAfee, pc_saleprice)
 VALUES
 ('$_POST[pro_id]','$_POST[chan_id]','$_POST[pc_percentfee]','$_POST[pc_FBAfee]','$_POST[saleprice]')";
 
if (!mysql_query($sql,$con))
   {
   die('Error: ' . mysql_error());
   }
 echo "<br><br>One Record Added";
 
mysql_close($con);
 ?> 

<br><br><a href="pchannel.php">Go To Channels Page</a>

<?php
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?>
 </html>