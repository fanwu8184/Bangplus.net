<html>
<HEAD>
<TITLE>Bangplus: Remove a Channel record</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Remove a Channel record</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<p align="center"><b>Are you sure you want to REMOVE the following channel record:</b><br><br>';

$pro_id = $_GET['id'];
$chan_id = $_GET['id2'];

$result = mysql_query("SELECT * FROM PRO_CHAN pc, CHANNEL c where pc.chan_id = c.chan_id and pro_id = '$pro_id' and pc.chan_id = '$chan_id'");
$row = mysql_fetch_array($result);
echo "<b>Product ID: </b>" . $row['pro_id'] . " <b>Channel: </b>" . $row['chan_name'];

mysql_close($con);
 ?> 
 
<form action="pchan_delete2.php" method="post">
<input type="radio" name="confirm" value="Y">Yes!
<input type="radio" name="confirm" value="N">No!
<input type="hidden" name="pro_id" value="<?php echo $pro_id ?>">
<input type="hidden" name="chan_id" value="<?php echo $chan_id ?>">
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