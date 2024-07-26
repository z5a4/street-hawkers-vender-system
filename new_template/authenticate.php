<?php
session_start();

// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hawks"; // Replace with your actual database name

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the submitted username and password
$name = $_POST['Name'];
$password = $_POST['Password'];

// Query the database to check for authentication
$sql = "SELECT * FROM location WHERE h_name = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Authentication successful, store hawker name in a session variable
    $_SESSION['Name'] = $name;

    // Redirect to the records page
    header("Location: hawkindex.php");
    exit();
} else {
    // Authentication failed, redirect back to the login page
    header("Location: Hform.html");
    exit();
}
