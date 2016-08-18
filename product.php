<html>
<HEAD>
<TITLE>Bangplus Products</TITLE>
</HEAD>
<H1><B><p align="center"><font color="green" face="arial">Bangplus: Products</font></p></B></H1>

<p align="center">
<?php
session_start();
if($_SESSION['username'])
{
require_once ('menu.php');
require_once ('conmysql.php');

echo '<a href="supplier.php">Suppliers</a> <a href="category.php">Categories</a><br><br>';
echo '<a href="pro_insert.php">Add a New Product</a><br><br>';

$result = mysql_query("SELECT * FROM PRODUCT p left join SUPPLIER s on p.sup_id = s.sup_id left join CATEGORY c on p.cat_id = c.cat_id order by p.pro_id");
 
echo "<table border='1'>
 <tr>
 <th>Image</th>
 <th>ID</th>
 <th>Name</th>
 <th>Subname</th>
 <th>UPC</th>
 <th>MPN</th>
 <th>Description</th>
 <th>Weight</th>
 <th>Package L</th>
 <th>Package W</th>
 <th>Package H</th>
 <th>Volume Weight</th>
 <th>Cost(RMB)</th>
 <th>Unit</th>
 <th>Category</th>
 <th>Supplier</th>
 <th>Actions</th>
 </tr>";
 
while($row = mysql_fetch_array($result))
   {
   echo "<tr>";
   echo '<td><img src="images/'.$row['pro_id'].'/'.$row['pro_id'].'-1.jpg" width="80" height="60"></td>';
   echo "<td>" . $row['pro_id'] . "</td>";
   echo "<td>" . $row['pro_name'] . "</td>";
   echo "<td>" . $row['pro_subname'] . "</td>";
   echo "<td>" . $row['pro_upc'] . "</td>";
   echo "<td>" . $row['pro_mpn'] . "</td>";
   echo '<td><a href="pro_desc.php?id='.$row['pro_id'].'">English</a></td>';
   echo "<td>" . $row['pro_weight'] . "</td>";
   echo "<td>" . $row['pro_packl'] . "</td>";
   echo "<td>" . $row['pro_packw'] . "</td>";
   echo "<td>" . $row['pro_packh'] . "</td>";
   echo "<td>" . $row['pro_vweight'] . "</td>";
   echo "<td>" . $row['pro_price'] . "</td>";
   echo "<td>" . $row['pro_unit'] . "</td>";
   echo "<td>" . $row['cat_name'] . "</td>";
   echo '<td><a href="supplier.php?id='.$row['sup_id'].'">'.$row['sup_name'].'</a></td>';
   echo '<td><a href="pro_edit.php?id='.$row['pro_id'].'">Edit</a> <a href="pro_delete.php?id='.$row['pro_id'].'">Remove</a></td>';
   echo	"</tr>";
   }
 echo "</table>";
 
mysql_close($con);
}
else
{
  echo 'You need to log in. <a href="index.php">Go To Home Page</a>';
}
 ?> 
 </p>
 
</html> 