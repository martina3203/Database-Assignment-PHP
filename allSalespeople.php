<html>
<head>
	<title>Query for all Salespeople</title>
</head>

<body>
    List of All Salespeople within the Database
<?php
include("connect.php");

 $sql = "SELECT * FROM `salespeople`
         ORDER by `ID` ASC";

  $query = mysqli_query($connection,$sql)
    or die("Database not available at this time.<br>" . mysql_error());

  print "<table align=\"left\" cellspacing=\"2\" cellpadding=\"2\" border=\"5\">\n";
  print "<tr> <td> <b> ID Number </b> </td> <td> <b> Salesperson Name </b> </td> "
  . "<td> <b> Commission Rate (as %) </b> </td> </tr>";
  
  while($result = mysqli_fetch_array($query)) {
    $id = $result["ID"];
    $name = $result["Name"];
    $commission = $result["Comm. Rate (%)"];
?>
<br>

    <tr>
      <td> <?php echo  $id ?> </td>
      <td> <?php echo $name ?> </td>
      <td> <?php echo $commission ?> </td>
    </tr>

<?php
}  //end while
?>
</table>
</body>
</html>
