<html>
<HEAD>
<TITLE>Bangplus FBA Purchase List</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: FBA Purchase List</font></p></B></H1>

<p align="center">
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="purchaselist.php">Purchase List</a> <br><br><a href="fba_plist_insert.php">Add a New Record</a><br><br>';


$result = mysql_query("SELECT fpl.*, fs_name, pro_name, pro_subname, pro_upc, pro_mpn, pro_price, pro_unit, sup_name 
from FBA_PLIST fpl, FBA_STORE fs, PRODUCT p, SUPPLIER s 
where fpl.fs_id = fs.fs_id and fpl.pro_id = p.pro_id and p.sup_id = s.sup_id and fpl_status = 0 order by fs_name, pro_id");
 
echo "<table border='1'>
 <tr>
 <th>ID</th>
 <th>Store</th>
 <th>Product ID</th>
 <th>Supplier</th>
 <th>UPC</th>
 <th>MPN</th>
 <th>Product Name</th>
 <th>Product SubName</th>
 <th>Unit</th>
 <th>Quantity</th>
 <th>Each Price</th>
 <th>Purchase Price (RMB)</th>
 <th>Create Date</th>
 <th>Status</th>
 </tr>";

$t_price = 0;
 
while($row = mysql_fetch_array($result))
   {
   $price = $row['pro_price'] * $row['fpl_quantity'];
   
   if($row['fpl_status'] == 0)
   {
     $status = "Processing";
     $t_price = $t_price + $price;
   }
   else
     $status = "Finished";
	 
   echo "<tr>";
   echo "<td>" . $row['fpl_id'] . "</td>";
   echo "<td>" . $row['fs_name'] . "</td>";
   echo "<td>" . $row['pro_id'] . "</td>";
   echo "<td>" . $row['sup_name'] . "</td>";
   echo "<td>" . $row['pro_upc'] . "</td>";
   echo "<td>" . $row['pro_mpn'] . "</td>";
   echo "<td>" . $row['pro_name'] . "</td>";
   echo "<td>" . $row['pro_subname'] . "</td>";
   echo "<td>" . $row['pro_unit'] . "</td>";
   echo "<td>" . $row['fpl_quantity'] . "</td>";
   echo "<td>" . $row['pro_price'] . "</td>";
   echo "<td>" . $price . "</td>";
   echo "<td>" . $row['fpl_createdate'] . "</td>";
   echo '<td><a href="fba_plist_status.php?id='.$row['fpl_id'].'">'.$status.'</a></td>';
   echo '<td><a href="fba_plist_edit.php?id='.$row['fpl_id'].'">Edit</a> <a href="fba_plist_delete.php?id='.$row['fpl_id'].'">Remove</a></td>';
   echo	"</tr>";
   }
 echo "</table>";
 echo "The Total Purchase Price is $t_price (RMB)";
 
mysql_close($con);
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
 ?> 
 </p>
 
</html> 