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

$sql="UPDATE PRO_CHAN SET pc_percentfee='$_POST[pc_percentfee]', pc_FBAfee='$_POST[pc_FBAfee]', pc_saleprice='$_POST[pc_saleprice]' where pro_id ='$_POST[pro_id]' and chan_id = '$_POST[chan_id]'";

if (!mysql_query($sql,$con))
   {
   die('Error: ' . mysql_error());
   }
echo "<br><br>One Record Updated";
 
mysql_close($con);

echo '<br><br><a href="pchannel.php">Go To Channels Page</a>';
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
 ?> 

 </html>