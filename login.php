<html>
<HEAD>
<TITLE>Bangplus</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus</font></p></B></H1>

<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if($username&&$password)
{
  if($username == 'xidian' && $password == 'Xidian,050013')
  {
    echo 'Login successful......<br><br>';
	$_SESSION['username']=$username;
	require_once ('menu.php');
  }
  else
  {
    echo 'Login fail. <a href="index.php">Go To Home Page</a>';
  }
}
else
{
  echo 'Please enter a username and password. <a href="index.php">Go To Home Page</a>';
}
?>

</html>