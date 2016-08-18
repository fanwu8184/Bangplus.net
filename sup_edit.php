<html>
<HEAD>
<TITLE>Bangplus Edit a Supplier</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Edit a Supplier</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

$sup_id = $_GET['id'];
$result = mysql_query("SELECT * FROM SUPPLIER where sup_id = '$sup_id'");
$row = mysql_fetch_array($result);

$sup_name = $row['sup_name'];
$sup_address = $row['sup_address'];
$sup_contactinfo = $row['sup_contactinfo'];
?>

<form action="sup_edit2.php" method="post">
 <input type="hidden" name="id" value="<?php echo $sup_id ?>">
 Name:<br><input type="text" name="name" size="100" value="<?php echo $sup_name; ?>"><br>
 Address:<br><input type="text" name="address" size="100" value="<?php echo $sup_address; ?>"><br>
 Contact Info.:<br><textarea name="contactinfo" rows="25" cols="100"><?php echo $sup_contactinfo; ?></textarea><br><br>
 <input type="submit" value="Update">
</form>
<?php
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?> 
 </html>