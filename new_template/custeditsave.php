<!DOCTYPE HTML>
<html>
<head>
    <title>SAVE</title>
</head>
<body>
<center>

<?php
if(isset($_POST['Submit']))
{
    // Database connection parameters
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "hawks";

    // Create a connection to the database
    $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

    if (!$con) {
        die("Could not connect to the database: " . mysqli_connect_error());
    }

    $id = $_POST['D1'];
    $username = $_POST['D2'];
    $password = $_POST['D3'];
    $email = $_POST['D4'];
    $phone = $_POST['D5'];
    $fullname = $_POST['D6'];
    $address = $_POST['D7'];

    $sql = "UPDATE Customers SET Username='$username', Password='$password', Email='$email', Phone_No='$phone', FullName='$fullname', Address='$address' WHERE Id='$id'";

    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully<br/>";
    } else {
        echo "Error updating record: " . mysqli_error($con) . "<br/>";
    }

    mysqli_close($con);
    
    header("Location: cust_edit.php");
}
?>
</center>
</body>
</html>
