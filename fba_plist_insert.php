<html>
<HEAD>
<TITLE>Bangplus Add a New FBA Purchase Record</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Add a New FBA Purchase Record</font></p></B></H1>
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

?>
<p align="center"><a href="fba_plist.php">FBA Purchase List</a> <a href="logout.php">Log out</a></p>

<form action="fba_plist_insert2.php" method="post">
 Store:<br><select name="fs_id">
 <option value="">---</option>
 <?php
 $result = mysql_query("SELECT * FROM FBA_STORE order by fs_name");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["fs_id"].'">'.$row["fs_name"].'</option>';
   }
 ?>
 </select><br>
 Product ID:<br><select name="pro_id">
 <option value="">---</option>
 <?php
 $result = mysql_query("SELECT pro_id FROM PRODUCT order by pro_id");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["pro_id"].'">'.$row["pro_id"].'</option>';
   }
   mysql_close($con);
 ?>
 </select><br>
 Quantity:<br><input type="text" name="fpl_quantity"><br>
 Create Date:<br><font color="red">Please enter a date as the fololwing format: yyyy/mm/dd</font><br><input type="text" name="fpl_createdate"><br><br>
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