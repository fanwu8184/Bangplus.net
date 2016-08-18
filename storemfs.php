<html>
<HEAD>
<TITLE>Bangplus Store Finance</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Store Finance</font></p></B></H1>

<p align="center">
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="storep.php">Store Pay</a> <a href="storei.php">Store Income</a> <a href="storea.php">Store Ads</a><br><br>';

$fs_name=$_POST[fs_name];
$result = mysql_query("select * from STORE_MON_F where fs_name = '$fs_name' order by f_time");
 
echo "<table border='1'>
 <tr>
 <th>Time</th>
 <th>Store</th>
 <th>Income</th>
 <th>Pay</th>
 <th>Ads</th>
 <th>Balance</th>
 </tr>";
 
 $Total = 0;
 
while($row = mysql_fetch_array($result))
   {
   $Total = $Total + $row['balance'];
   
   echo "<tr>";
   echo "<td>" . $row['f_time'] . "</td>";
   echo "<td>" . $row['fs_name'] . "</td>";
   echo "<td>" . $row['income'] . "</td>";
   echo "<td>" . $row['pay'] . "</td>";
   echo "<td>" . $row['sa_cost'] . "</td>";
   echo "<td>" . $row['balance'] . "</td>";
   echo	"</tr>";
   }
 echo "</table>";
 echo "The Total Balance is $Total (RMB)<br><br>";

echo "<b>Please Pick a Value: </b>";
?>

<form action="storemfm.php" method="post">
Month:<br><select name="f_time">
 <option value=""></option>
 <?php
 $result = mysql_query("SELECT distinct f_time FROM STORE_MON_F order by f_time");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["f_time"].'">'.$row["f_time"].'</option>';
   }
 ?>
 </select>
<input type="submit" value="Submit">
 </form>
 
 
 <form action="storemfs.php" method="post">
Store:<br><select name="fs_name">
 <option value=""></option>
 <?php
 $result = mysql_query("SELECT distinct fs_name FROM FBA_STORE order by fs_name");
 while($row = mysql_fetch_array($result))
   {
   echo '<option value="'.$row["fs_name"].'">'.$row["fs_name"].'</option>';
   }
 ?>
 </select>
<input type="submit" value="Submit">
 </form>

<?php
mysql_close($con);
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
 ?> 
 </p>
 
</html> 