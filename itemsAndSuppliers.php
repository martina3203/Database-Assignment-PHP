<html>
<head>
	<title>Query for all Items</title>
</head>

<body>
    List of All Items along with their Supplier
<?php
include("connect.php");

 $sql = "SELECT items.ItemName,suppliers.Name FROM items INNER JOIN suppliers ON items.supplier = suppliers.ID";

  $query = mysqli_query($connection,$sql)
    or die("Database not available at this time.<br>" . mysql_error());

  print "<table align=\"left\" cellspacing=\"2\" cellpadding=\"2\" border=\"5\">\n";
  print "<tr> <td> <b> Item Name </b> </td> <td> <b> Supplier Name </b> </td> </tr>";
  
  while($result = mysqli_fetch_array($query)) {
    $item = $result["ItemName"];
    $supplier = $result["Name"];
?>
<br>

    <tr>
      <td> <?php echo $item ?> </td>
      <td> <?php echo $supplier ?> </td>
    </tr>

<?php
}  //end while
?>
</table>
</body>
</html>
