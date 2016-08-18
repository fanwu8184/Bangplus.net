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

$desc = mysqli_real_escape_string($con2, $_POST[desc]);
$vweight = $_POST[pro_packl] * $_POST[pro_packw] * $_POST[pro_packh] / 5 / 1000;

$sql="INSERT INTO PRODUCT (pro_id, pro_name, pro_subname, pro_upc, pro_mpn, pro_desc, pro_weight, pro_packl, pro_packw, pro_packh, pro_vweight, pro_price, pro_unit, sup_id, cat_id)
 VALUES
 ('$_POST[id]','$_POST[name]','$_POST[pro_subname]','$_POST[pro_upc]','$_POST[pro_mpn]','$desc','$_POST[weight]','$_POST[pro_packl]','$_POST[pro_packw]','$_POST[pro_packh]','$vweight','$_POST[price]','$_POST[pro_unit]','$_POST[sup_id]','$_POST[cat_id]')";
 
if (!mysql_query($sql,$con))
   {
   die('Error: ' . mysql_error());
   }
 echo "<br><br>One Product Added";
 
mysql_close($con);
 ?> 

<br><br><a href="product.php">Go To Products Page</a>

<?php
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?>
 </html>