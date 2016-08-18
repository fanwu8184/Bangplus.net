<html>
<HEAD>
<TITLE>Bangplus Edit a Category</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Edit a Category</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

$cat_id = $_GET['id'];
$result = mysql_query("SELECT * FROM CATEGORY where cat_id = '$cat_id'");
$row = mysql_fetch_array($result);

$cat_name = $row['cat_name'];
?>

<form action="cat_edit2.php" method="post">
 <input type="hidden" name="id" value="<?php echo $cat_id ?>">
 Category:<br><input type="text" name="name" size="50" value="<?php echo $cat_name; ?>"><br><br>
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