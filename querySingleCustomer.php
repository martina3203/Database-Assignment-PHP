<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><title>Query for Single Customer</title></head><body>
<?php include("connect.php");

if (isset($_POST['id'])) {
  $id = $_POST['id'];
}

if (isset($_POST['name']))
{
    $name = $_POST['name'];
}

if(!empty($id) or (!empty($name))) {

  if (!empty($id))
  {
      $sql = "SELECT * FROM `customers` WHERE `Cred_card_#` = $id";
  }
  else if (!empty($name))
  {
      $sql = "SELECT * FROM `customers` WHERE `Name` = '$name'";
  }
  else
  {
      die("Big Error");
  }

  $query = mysqli_query($connection,$sql)
    or die("Cannot query the database.<br>" . mysql_error());

  $num_rows = mysqli_num_rows($query);
  if ($num_rows == 0) {print "There is no record with that id";}

  print "<table align=\"left\" cellspacing=\"2\" cellpadding=\"2\" border=\"0\">\n";

  while($result = mysqli_fetch_array($query)) {
        $id = $result["Cred_Card_#"];
        $name = $result["Name"];
	$address = $result["Address"];
        $creditLimit = $result["Credit Limit"];?>

<table>
  <tbody><tr>
    <td> <?php echo 'Credit Card Number:  '. $id. '<br>';
	echo 'Name: ' .$name. '<br>';
        echo 'Address: ' .$address. '<br>';
        echo 'Credit Limit: ' .$creditLimit. '<br>';
	?> <br>
</td>
  </tr>
</tbody></table>

<?php }
  } else {

?>




<form name="Students" method="post" action="querySingleCustomer.php" enctype="multipart/form-data">


	<b>Enter ID:  </b>
	<input name="id" size="5" type="text">
<br>
OR
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
<br>
<a href="http://localhost/Database%20Assignment/Home%20Page.html">Return to Home Page</a><br>
</body></html>