<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><title>Add Customer</title></head><body>
<?php include("connect.php");
$validInput = true;
$name = "nope";
$address = "nope";
$creditLimit = "nope";
if (isset($_POST['name']))
{
    $name = $_POST['name'];
    if (Empty($name))
    {
        $validInput = false;
        echo "Invalid input in the Name Field. <br>";
    }
}
if (isset($_POST['address']))
{
    $address = $_POST['address'];
    if (Empty($address))
    {
        $validInput = false;
        echo "Invalid input in the Address Field. <br>";
    }
}
if (isset($_POST['creditLimit']))
{
    $creditLimit = $_POST['creditLimit'];
    if (Empty($creditLimit) or !is_numeric($creditLimit))
    {
        $validInput = false;
        echo "Invalid input in Credit Limit Field. <br>";
    }
}
if($validInput == true and $name != "nope") {
    $sql = "INSERT INTO customers (`Name`, `Address`, `Credit Limit`) VALUES ('$name','$address',$creditLimit)";
    if (mysqli_query($connection,$sql))
    {
       echo "Record added!";
    }
    else 
    {
        echo "Unable to add record.";
    }
  } else { 
?>
Please fill in all of the fields to add a customer to the Database.
<form name="query" method="post" action="addCustomer.php" enctype="multipart/form-data">
<br>
        <b>Enter Name: </b>
        <input name="name" size="20" type="text"> <br>
        <b>Enter Address: </b>
        <input name="address" size="40" type="text"> <br>
        <b>Enter Credit Limit: </b>
        <input name="creditLimit" size ="8" type="number"> <br>
        <input name="upload" value="Submit" type="submit">
        <input name="reset" value="Reset" type="reset">
</form><?php }
?><br>
<br>
<br>
<br>
<a href="http://localhost/Database%20Assignment/Home%20Page.html">Return to Home Page</a><br>
</body></html>