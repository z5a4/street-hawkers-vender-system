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

    // Check if the connection was successful
    if (!$con) {
        die("Could not connect to the database: " . mysqli_connect_error());
    }

    // Escape the ID parameter to prevent SQL injection
    $id = mysqli_real_escape_string($con, $_POST['D1']);

    // Query to delete the record
    $sql = "DELETE FROM Customers WHERE Id='$id'";

    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully<br/>";
    } else {
        echo "Error deleting record: " . mysqli_error($con) . "<br/>";
    }

    mysqli_close($con);
    
    header("Location: custdelete.php");
}
?>
</center>
</body>
</html>
