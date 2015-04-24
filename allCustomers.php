<html>
<head>
	<title>Query for all Customers</title>
</head>

<body>
    List of All Customers within the Database
<?php
include("connect.php");

 $sql = "SELECT * FROM `customers`
         ORDER by `Cred_Card_#` ASC";

  $query = mysqli_query($connection,$sql)
    or die("Database not available at this time.<br>" . mysql_error());

  print "<table align=\"left\" cellspacing=\"2\" cellpadding=\"2\" border=\"5\">\n";
  print "<tr> <td> <b> Credit Card Number </b> </td> <td> <b> Customer Name </b> </td> "
  . "<td> <b> Address </b> </td> <td> <b> Credit Limit </b> </td> </tr>";
  
  while($result = mysqli_fetch_array($query)) {
    $id = $result["Cred_Card_#"];
    $name = $result["Name"];
    $address = $result["Address"];
    $creditLimit = $result["Credit Limit"];


?>
<br>

    <tr>
      <td> <?php echo  $id ?> </td>
      <td> <?php echo $name ?> </td>
      <td> <?php echo $address ?> </td>
      <td> <?php echo $creditLimit ?> </td>
    </tr>

<?php
}  //end while
?>
</table>
</body>
</html>
