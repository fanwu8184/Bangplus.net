<html>
<HEAD>
<TITLE>Bangplus: Add a New Category</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Add a New Category</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');

?>
<p align="center"><a href="product.php">Go To Products Page</a> <a href="logout.php">Log out</a></p>

<form action="cat_insert2.php" method="post">
 Category:<br><input type="text" name="name" size="50"><br><br>
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