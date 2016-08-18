<html>
<HEAD>
<TITLE>Bangplus Add a New Product</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Add a New Product</font></p></B></H1>
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');

?>
<p align="center"><a href="product.php">Go To Products Page</a> <a href="logout.php">Log out</a></p>

<form action="pro_insert2.php" method="post">
 ID:<br><input type="text" name="id"><br>
 Name:<br><input type="text" name="name" size="100"><br>
 SubName:<br><input type="text" name="pro_subname" size="100"><br>
 UPC:<br><input type="text" name="pro_upc"><br>
 MPN:<br><input type="text" name="pro_mpn"><br>
 English Description:<br><textarea name="desc" rows="50" cols="200"></textarea><br>
 Weight (g):<br><input type="text" name="weight"><br>
 Package L (mm):<br><input type="text" name="pro_packl"><br>
 Package W (mm):<br><input type="text" name="pro_packw"><br>
 Package H (mm):<br><input type="text" name="pro_packh"><br>
 Purchase Price (RMB):<br><input type="text" name="price"><br>
 Unit:<br><input type="text" name="pro_unit"><br>
 Supplier:<br><select name="sup_id">
 <option value="---">---</option>
 <?php
 require_once ('conmysql.php');
 $result = mysql_query("SELECT * FROM SUPPLIER order by sup_name");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["sup_id"].'">'.$row["sup_name"].'</option>';
   }
 ?>
 </select><br>
 Category:<br><select name="cat_id">
 <option value="---">---</option>
 <?php
 $result = mysql_query("SELECT * FROM CATEGORY order by cat_name");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["cat_id"].'">'.$row["cat_name"].'</option>';
   }
 mysql_close($con);
 ?>
</select><br><br>
 <input type="submit" value="Add">
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