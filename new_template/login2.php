<?php
session_start(); // Start a PHP session

// Check if the form is submitted
if (isset($_POST['signin'])) {
    // User input
    $type = $_POST['userType'];
    $username = $_POST['Username'];
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
    $query = "SELECT * FROM Registration WHERE Type = '$type' AND Username = '$username' AND Password = '$password'";


    // Execute the query
    $result = mysqli_query($conn,$query);
    echo "$type,$username,$password";
    // Check if a row with matching credentials was found
    if ($result && mysqli_num_rows($result) == 1) {
        // Credentials are valid, redirect to the appropriate page
        if ($type === 'admin') {
            header('Location: index2.html');
        } elseif ($type === 'user') {
            header('Location: index1.html');
        }
        else {
            echo 'Invalid username or password.';
        }

        
    } else {
        // Credentials are invalid, display an error message
        echo 'Account does not exist.';
    }

    // Close the database connection
    $conn->close();
}
?>