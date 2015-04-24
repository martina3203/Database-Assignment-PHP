<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><title>Add Supplier</title></head><body>
<?php include("connect.php");
$validInput = true;
$name = "nope";
if (isset($_POST['name']))
{
    $name = $_POST['name'];
    if (Empty($name))
    {
        $validInput = false;
        echo "Invalid input in the Name Field. <br>";
    }
}

if($validInput == true and $name != "nope") {

    $sql = "INSERT INTO suppliers (`Name`) VALUES ('$name')";
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
Please fill in all of the fields to add a supplier to the Database.
<form name="query" method="post" action="addSupplier.php" enctype="multipart/form-data">
<br>
        <b>Enter Name: </b>
        <input name="name" size="25" type="text"> <br>
        <input name="upload" value="Submit" type="submit">
        <input name="reset" value="Reset" type="reset">
</form><?php }
?><br>
<br>
<br>
<a href="http://localhost/Database%20Assignment/Home%20Page.html">Return to Home Page</a><br>
</body></html>