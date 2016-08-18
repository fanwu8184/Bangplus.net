<html>
<HEAD>
<TITLE>Bangplus Edit a Record of Store Ads</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Edit a Record of Store Ads</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="storea.php">Store Ads</a>';

$sa_id = $_GET['id'];
$result = mysql_query("SELECT a.*, fs_name FROM FBA_STORE f, STORE_ADS a where f.fs_id = a.fs_id and a.sa_id = '$sa_id'");
$row = mysql_fetch_array($result);

$fs_id = $row['fs_id'];
$fs_name = $row['fs_name'];
$sa_date = $row['sa_date'];
$sa_cost = $row['sa_cost'];
?>

<form action="storea_edit2.php" method="post">
<input type="hidden" name="sa_id" value="<?php echo $sa_id ?>">
 Store:<br><select name="fs_id">
 <option value="<?php echo $fs_id; ?>"><?php echo $fs_name; ?></option>
 <?php
 $result = mysql_query("SELECT * FROM FBA_STORE order by fs_name");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["fs_id"].'">'.$row["fs_name"].'</option>';
   }
 ?>
 </select><br>
 Date:<br><font color="red">Please enter a date as the fololwing format: yyyy/mm/dd</font><br><input type="text" name="sa_date" value="<?php echo $sa_date; ?>"><br>
 Cost (RMB):<br><input type="text" name="sa_cost" value="<?php echo $sa_cost; ?>"><br>
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