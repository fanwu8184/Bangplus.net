<html>
<HEAD>
<TITLE>Bangplus Product's Description</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Product's Description</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

$pro_id = $_GET['id'];
echo "Product: " . $pro_id . "<br><br>";
$result = mysql_query("SELECT * FROM PRODUCT where pro_id = '$pro_id'");
$row = mysql_fetch_array($result);
echo $row['pro_desc'];

mysql_close($con);
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
 ?> 
 
</html> 