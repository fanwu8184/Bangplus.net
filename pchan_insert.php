<html>
<HEAD>
<TITLE>Bangplus Add a New Channel Record</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Add a New Channel Record</font></p></B></H1>
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

?>
<p align="center"><a href="pchannel.php">Go To Channels Page</a> <a href="logout.php">Log out</a></p>

<form action="pchan_insert2.php" method="post">
 Product ID:<br><select name="pro_id">
 <option value="---">---</option>
 <?php
 $result = mysql_query("SELECT * FROM PRODUCT order by pro_id");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["pro_id"].'">'.$row["pro_id"].'</option>';
   }
 ?>
 </select><br>
 Channel:<br><select name="chan_id">
 <option value="---">---</option>
 <?php
 $result = mysql_query("SELECT * FROM CHANNEL order by chan_id");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["chan_id"].'">'.$row["chan_name"].'</option>';
   }
 ?>
 </select><br>
 Fee (%):<br><input type="text" name="pc_percentfee"><br>
 FBA fee:<br><input type="text" name="pc_FBAfee"><br>
 Sale Price:<br><input type="text" name="saleprice"><br>
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