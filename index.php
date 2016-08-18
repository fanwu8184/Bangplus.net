<html>
<HEAD>
<TITLE>Bangplus</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
  echo 'You already logged in....<br><br>';
  require_once ('menu.php');
}
else
{
?>
<p align="center">
<form method="post" action="login.php">
 Username:<input type="text" name="username"><br>
 Password:<input type="password" name="password"><br><br>
 <input type="submit" value="Log in">
</form>
</p>
<?php
}
?>

</html>