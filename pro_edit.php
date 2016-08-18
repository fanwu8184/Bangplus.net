<html>
<HEAD>
<TITLE>Bangplus Edit a Product</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Edit a Product</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

$pro_id = $_GET['id'];
$result = mysql_query("SELECT * FROM PRODUCT p left join SUPPLIER s on p.sup_id = s.sup_id left join CATEGORY c on p.cat_id = c.cat_id where pro_id = '$pro_id'");
$row = mysql_fetch_array($result);

$pro_name = $row['pro_name'];
$pro_subname = $row['pro_subname'];
$pro_upc = $row['pro_upc'];
$pro_mpn = $row['pro_mpn'];
$pro_desc = $row['pro_desc'];
$pro_weight = $row['pro_weight'];
$pro_packl = $row['pro_packl'];
$pro_packw = $row['pro_packw'];
$pro_packh = $row['pro_packh'];
$pro_price = $row['pro_price'];
$pro_unit = $row['pro_unit'];
$sup_id = $row['sup_id'];
$sup_name= $row['sup_name'];
$cat_name = $row['cat_name'];
$cat_id = $row['cat_id'];
?>

<form action="pro_edit2.php" method="post">
 ID:<br><input type="text" name="id" value="<?php echo $pro_id; ?>"><br>
 Name:<br><input type="text" name="name" size="100" value="<?php echo $pro_name; ?>"><br>
 SubName:<br><input type="text" name="pro_subname" size="100" value="<?php echo $pro_subname; ?>"><br>
 UPC:<br><input type="text" name="pro_upc" value="<?php echo $pro_upc; ?>"><br>
 MPN:<br><input type="text" name="pro_mpn" value="<?php echo $pro_mpn; ?>"><br>
 English Description:<br><textarea name="desc" rows="50" cols="200"><?php echo $pro_desc; ?></textarea><br>
 Weight:<br><input type="text" name="weight" value="<?php echo $pro_weight; ?>"><br>
 Package L:<br><input type="text" name="pro_packl" value="<?php echo $pro_packl; ?>"><br>
 Package W:<br><input type="text" name="pro_packw" value="<?php echo $pro_packw; ?>"><br>
 Package H:<br><input type="text" name="pro_packh" value="<?php echo $pro_packh; ?>"><br>
 Purchase Price:<br><input type="text" name="price" value="<?php echo $pro_price; ?>"><br>
 Unit:<br><input type="text" name="pro_unit" value="<?php echo $pro_unit; ?>"><br>
 Supplier:<br><select name="sup_id">
 <option value="<?php echo $sup_id; ?>"><?php echo $sup_name; ?></option>
 <?php
 $result = mysql_query("SELECT * FROM SUPPLIER order by sup_name");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["sup_id"].'">'.$row["sup_name"].'</option>';
   }
 ?>
 </select><br>
 Category:<br><select name="cat_id">
 <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
 <?php
 $result = mysql_query("SELECT * FROM CATEGORY where cat_id != $cat_id order by cat_name");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["cat_id"].'">'.$row["cat_name"].'</option>';
   }
 mysql_close($con);
 ?>
</select><br><br>
 <input type="submit" value="Update">
 </form>
 <a href="product.php">Go To Products Page</a>
 
 <?php
 }
 else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?>
 </html>