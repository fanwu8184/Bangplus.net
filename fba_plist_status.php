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

$result = mysql_query("select * from FBA_PLIST where fpl_id ='$fpl_id'");
$row = mysql_fetch_array($result);

if($row['fpl_status'] == 0)
{
echo "<b>You are at FBA Purchase List ID: $fpl_id</b><br>";
echo "<b>Its status will be updated </b> ";
echo '<a href="fba_plist_status2.php?id='.$fpl_id.'">Yes</a><br><br>';
}
else
{
  echo "You already updated this record";
}
 mysql_close($con);
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
 ?> 
 </p>
 
</html> 