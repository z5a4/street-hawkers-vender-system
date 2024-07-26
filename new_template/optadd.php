<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hawks";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_SESSION['name'];
    $phone = $_SESSION['phone'];
    $location = $_POST['location'];
    $landmark = $_POST['landmark'];
    $time = $_POST['time'];
    $map_link = $_POST['map_link'];

    // SQL query to insert data into the table
    $sql = "INSERT INTO location (name, phone, location, landmark, time, map_link)
            VALUES ('$name', '$phone', '$location', '$landmark', '$time', '$map_link')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
