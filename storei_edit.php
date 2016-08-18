<html>
<HEAD>
<TITLE>Bangplus Edit a Record of Store Income</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Edit a Record of Store Income</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="storei.php">Store Income</a>';

$si_id = $_GET['id'];
$result = mysql_query("SELECT i.*, fs_name FROM FBA_STORE f, STORE_INCOME i where f.fs_id = i.fs_id and i.si_id = '$si_id'");
$row = mysql_fetch_array($result);

$fs_id = $row['fs_id'];
$fs_name = $row['fs_name'];
$si_date = $row['si_date'];
$si_income = $row['si_income'];
?>

<form action="storei_edit2.php" method="post">
<input type="hidden" name="si_id" value="<?php echo $si_id ?>">
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
 Income Date:<br><font color="red">Please enter a date as the fololwing format: yyyy/mm/dd</font><br><input type="text" name="si_date" value="<?php echo $si_date; ?>"><br>
 Income Value (RMB):<br><input type="text" name="si_income" value="<?php echo $si_income; ?>"><br><br>
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