<?php
session_start(); // Start a PHP session

// Check if the form is submitted
if (isset($_POST['signin'])) {
    // User input
    $name = $_POST['Name'];
    $password = $_POST['Password'];
    
    // Database connection parameters (modify as needed)
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'hawks';

    // Create a database connection
    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn){
        echo "Database Connected Successfully";
    } else {
        echo "Error Connecting to the Database";
    }
    // Check for database connection errors
    

    // Query to retrieve user data from the Registration table
    $query = "SELECT h_name, password FROM location WHERE h_name = '$name' AND password = '$password'";


    // Execute the query
    $result = mysqli_query($conn,$query);
    
    // Check if a row with matching credentials was found
    if ($result && mysqli_num_rows($result) == 1) {
        // Credentials are valid, redirect to the appropriate page
        header("location: hawkindex.php")
        // Insert data into the Login tabl

    } else {
        // Credentials are invalid, display an error message
        echo 'Account does not exist.';
    }

    // Close the database connection
    $conn->close();
}
?>
