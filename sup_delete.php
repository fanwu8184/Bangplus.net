<html>
<HEAD>
<TITLE>Bangplus: Remove a Supplier</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Remove a Supplier</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<p align="center"><b>Are you sure you want to REMOVE the following supplier:</b><br><br>';

$sup_id = $_GET['id'];
$result = mysql_query("SELECT * FROM SUPPLIER where sup_id = '$sup_id'");
$row = mysql_fetch_array($result);
echo "Supplier: " . $row['sup_name'];

mysql_close($con);
 ?> 
 
<form action="sup_delete2.php" method="post">
<input type="radio" name="confirm" value="Y">Yes!
<input type="radio" name="confirm" value="N">No!
<input type="hidden" name="id" value="<?php echo $sup_id ?>">
<input type="submit" value="Sumbit">
</form>
</p>
<?php
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?> 
</html>