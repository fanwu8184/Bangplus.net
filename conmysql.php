<?php
 $con = mysql_connect("bangplusnet.ipagemysql.com","xidian","050013");
 $con2 = mysqli_connect("bangplusnet.ipagemysql.com","xidian","050013", "bangplus");
 
 if (!$con)
   {
   die('Could not connect: ' . mysql_error());
   }
 
mysql_select_db("bangplus", $con);
?>