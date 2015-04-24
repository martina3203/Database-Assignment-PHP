<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><title>Query for Single Supplier</title></head><body>
<?php include("connect.php");

if (isset($_POST['name']))
{
    $name = $_POST['name'];
}

if(!empty($name)) {

    $sql = "SELECT * FROM suppliers WHERE Name = '$name'";

  $query = mysqli_query($connection,$sql)
    or die("Cannot query the database.<br>" . mysql_error());

  $num_rows = mysqli_num_rows($query);
  if ($num_rows == 0) {print "There is no record with that id";}

  print "<table align=\"left\" cellspacing=\"2\" cellpadding=\"2\" border=\"5\">\n";
  print "<tr> <td> <b> ID </b> </td> <td> <b> Supplier Name </b> </td> </tr> ";

  while($result = mysqli_fetch_array($query)) {
        $id = $result["ID"];
        $name = $result["Name"];?>

    <tr>
      <td> <?php echo $id ?> </td>
      <td> <?php echo $name ?> </td>
    </tr>
</table>

<?php }
  } else {
?>

<form name="query" method="post" action="querySupplier.php" enctype="multipart/form-data">

<br>
        <b>Enter Name: </b>
        <input name="name" size="20" type="text">

<br>
        <input name="upload" value="Submit" type="submit">
        <input name="reset" value="Reset" type="reset">
</form><?php }
?><br>
<br>
<br>
<br>
<a href="http://localhost/Database%20Assignment/Home%20Page.html">Return to Home Page</a><br>
</body></html>