<html>
<HEAD>
<TITLE>Bangplus Edit a FBA Purchase Record</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Edit a FBA Purchase Record</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

$fpl_id = $_GET['id'];
$result = mysql_query("SELECT fpl.*, fs_name FROM FBA_PLIST fpl, FBA_STORE fs where fpl.fs_id = fs.fs_id and fpl_id = '$fpl_id'");
$row = mysql_fetch_array($result);

$fpl_id = $row['fpl_id'];
$fs_id = $row['fs_id'];
$fs_name = $row['fs_name'];
$pro_id = $row['pro_id'];
$fpl_quantity = $row['fpl_quantity'];
$fpl_createdate = $row['fpl_createdate'];
?>

<form action="fba_plist_edit2.php" method="post">
 <input type="hidden" name="fpl_id" value="<?php echo $fpl_id ?>">
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
  Product ID:<br><select name="pro_id">
 <option value="<?php echo $pro_id; ?>"><?php echo $pro_id; ?></option>
 <?php
 $result = mysql_query("SELECT pro_id FROM PRODUCT order by pro_id");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["pro_id"].'">'.$row["pro_id"].'</option>';
   }
   mysql_close($con);
 ?>
 </select><br>
 Quantity:<br><input type="text" name="fpl_quantity" value="<?php echo $fpl_quantity; ?>"><br>
 Create Date:<br><input type="text" name="fpl_createdate" value="<?php echo $fpl_createdate; ?>"><br><br>
 <input type="submit" value="Update">
 </form>
 <a href="fba_plist.php">FBA Purchase List</a>
 
 <?php
 }
 else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
?>
 </html>