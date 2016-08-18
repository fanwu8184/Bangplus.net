<html>
<HEAD>
<TITLE>Bangplus: Remove a Product</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Remove a Product</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<p align="center"><b>Are you sure you want to REMOVE the following product:</b><br><br>';

$pro_id = $_GET['id'];
$result = mysql_query("SELECT * FROM PRODUCT where pro_id = '$pro_id'");
 
echo "<table border='1'>
 <tr>
 <th>Image</th>
 <th>ID</th>
 <th>Name</th>
 <th>Subname</th>
 </tr>";
 
while($row = mysql_fetch_array($result))
   {
   echo "<tr>";
   echo '<td><img src="images/'.$row['pro_id'].'/'.$row['pro_id'].'-1.jpg" width="80" height="60"></td>';
   echo "<td>" . $row['pro_id'] . "</td>";
   echo "<td>" . $row['pro_name'] . "</td>";
   echo "<td>" . $row['pro_subname'] . "</td>";
   echo	"</tr>";
   }
 echo "</table>";
 
mysql_close($con);
 ?> 
 
<form action="pro_delete2.php" method="post">
<input type="radio" name="confirm" value="Y">Yes!
<input type="radio" name="confirm" value="N">No!
<input type="hidden" name="id" value="<?php echo $pro_id ?>">
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