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

    // Escape and retrieve data from the form fields
    $D1 = mysqli_real_escape_string($con, $_POST['D1']);
    $D2 = mysqli_real_escape_string($con, $_POST['D2']);
    $D3 = mysqli_real_escape_string($con, $_POST['D3']);
    $D4 = mysqli_real_escape_string($con, $_POST['D4']);
    $D5 = mysqli_real_escape_string($con, $_POST['D5']);
    $D6 = mysqli_real_escape_string($con, $_POST['D6']);
    $D7 = mysqli_real_escape_string($con, $_POST['D7']);

    // Query to insert data into the Customers table
    $sql = "INSERT INTO location
            VALUES ('$D1', '$D2', '$D3', '$D4', '$D5', '$D6', '$D7')";

    if (mysqli_query($con, $sql)) {
        ?>
                <script>
                    alert("Data Inserted Successfully");
                </script>
                <?php
    } else {
        echo "Error inserting data: " . mysqli_error($con) . "<br/>";
    }

    mysqli_close($con);
    
    //header("Location: custinsert.php");
}
?>
</center>
</body>
</html>
