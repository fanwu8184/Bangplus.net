<html>
<HEAD>
<TITLE>Bangplus Add a New Supplier</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Add a New Supplier</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
?>

<form action="sup_insert2.php" method="post">
 Name:<br><input type="text" name="name" size="100"><br>
 Address:<br><input type="text" name="address" size="100"><br>
 Contact Info.:<br><textarea name="contactinfo" rows="25" cols="100"></textarea><br><br>
 <input type="submit" value="Add">
</form>
<?php
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?> 
</html>