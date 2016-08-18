<html>
<HEAD>
<TITLE>Bangplus: Remove a FBA Purchase Record</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Remove a FBA Purchase Record</font></p></B></H1>

<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<p align="center"><b>Are you sure you want to REMOVE the following Record:</b><br><br>';

$fpl_id = $_GET['id'];
$result = mysql_query("SELECT fpl.*, fs_name, pro_name, pro_subname, pro_upc, pro_mpn from FBA_PLIST fpl, FBA_STORE fs, PRODUCT p where fpl.fs_id = fs.fs_id and fpl.pro_id = p.pro_id and fpl_id = '$fpl_id' order by fpl_id limit 100");
 
echo "<table border='1'>
 <tr>
 <th>Store</th>
 <th>Product ID</th>
 <th>UPC</th>
 <th>MPN</th>
 <th>Product Name</th>
 <th>Product SubName</th>
 <th>Quantity</th>
 <th>Create Date</th>
 <th>Status</th>
 </tr>";
 
while($row = mysql_fetch_array($result))
   { 
   if($row['fpl_status'] == 0)
     $status = "Processing";
   else
     $status = "Finished";
	 
   echo "<tr>";
   echo "<td>" . $row['fs_name'] . "</td>";
   echo "<td>" . $row['pro_id'] . "</td>";
   echo "<td>" . $row['pro_upc'] . "</td>";
   echo "<td>" . $row['pro_mpn'] . "</td>";
   echo "<td>" . $row['pro_name'] . "</td>";
   echo "<td>" . $row['pro_subname'] . "</td>";
   echo "<td>" . $row['fpl_quantity'] . "</td>";
   echo "<td>" . $row['fpl_createdate'] . "</td>";
   echo "<td>" . $status . "</td>";
   echo '<td><a href="fba_plist_edit.php?id='.$row['fpl_id'].'">Edit</a> <a href="fba_plist_delete.php?id='.$row['fpl_id'].'">Remove</a></td>';
   echo	"</tr>";
   }
 echo "</table>";
 
mysql_close($con);
 ?> 
 
<form action="fba_plist_delete2.php" method="post">
<input type="radio" name="confirm" value="Y">Yes!
<input type="radio" name="confirm" value="N">No!
<input type="hidden" name="fpl_id" value="<?php echo $fpl_id ?>">
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