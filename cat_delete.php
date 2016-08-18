<html>
<HEAD>
<TITLE>Bangplus: Remove a Category</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Remove a Category</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<p align="center"><b>Are you sure you want to REMOVE the following category:</b><br><br>';


$cat_id = $_GET['id'];
$result = mysql_query("SELECT * FROM CATEGORY where cat_id = '$cat_id'");
$row = mysql_fetch_array($result);
echo "Category: " . $row['cat_name'];

mysql_close($con);
 ?> 
 
<form action="cat_delete2.php" method="post">
<input type="radio" name="confirm" value="Y">Yes!
<input type="radio" name="confirm" value="N">No!
<input type="hidden" name="id" value="<?php echo $cat_id ?>">
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