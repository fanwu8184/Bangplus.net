<html>
<HEAD>
<TITLE>Bangplus Edit a Channel Record</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Edit a Channel Record</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

$pro_id = $_GET['id'];
$chan_id = $_GET['id2'];
$result = mysql_query("SELECT pc.*, chan_name FROM PRO_CHAN pc, CHANNEL c where pc.chan_id = c.chan_id and pro_id = '$pro_id' and pc.chan_id = '$chan_id'");
$row = mysql_fetch_array($result);

$chan_name = $row['chan_name'];
$pc_percentfee = $row['pc_percentfee'];
$pc_FBAfee = $row['pc_FBAfee'];
$pc_saleprice = $row['pc_saleprice'];

echo "Product ID: $pro_id" . "<br>" . "Channel: $chan_name" . "<br>";

?>

<form action="pchan_edit2.php" method="post">
 <input type="hidden" name="pro_id" value="<?php echo $pro_id ?>">
 <input type="hidden" name="chan_id" value="<?php echo $chan_id ?>">
 Fee (%):<br><input type="text" name="pc_percentfee" value="<?php echo $pc_percentfee; ?>"><br>
 FBA fee:<br><input type="text" name="pc_FBAfee" value="<?php echo $pc_FBAfee; ?>"><br>
 Sale Price:<br><input type="text" name="pc_saleprice" value="<?php echo $pc_saleprice; ?>"><br>
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