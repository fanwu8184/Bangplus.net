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

$sql="UPDATE PRODUCT SET pro_id='$_POST[id]', pro_name='$_POST[name]', pro_subname='$_POST[pro_subname]', pro_upc='$_POST[pro_upc]', pro_mpn='$_POST[pro_mpn]', pro_desc='$desc', pro_weight='$_POST[weight]', pro_packl='$_POST[pro_packl]', pro_packw='$_POST[pro_packw]', pro_packh='$_POST[pro_packh]', 
pro_vweight = '$vweight', pro_price='$_POST[price]', pro_unit='$_POST[pro_unit]', sup_id='$_POST[sup_id]', cat_id='$_POST[cat_id]' where pro_id = '$_POST[id]'";

if (!mysql_query($sql,$con))
   {
   die('Error: ' . mysql_error());
   }
echo "<br><br>One Product Updated";
 
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