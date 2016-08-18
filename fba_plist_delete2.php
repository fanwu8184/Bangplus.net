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
  $sql="delete from FBA_PLIST where fpl_id = '$_POST[fpl_id]'";
 
  if (!mysql_query($sql,$con))
     {
     die('Error: ' . mysql_error());
     }
  echo "<br><br>One FBA Purchase Record Deleted";

  mysql_close($con);
}
else
{
  echo "<br><br>No FBA Purchase Record Deleted";
}

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