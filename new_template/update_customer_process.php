<?php
if (isset($_POST['Type']) && isset($_POST['RegId']) && isset($_POST['Password']) && isset($_POST['Email']) && isset($_POST['Mobile_No.']) && isset($_POST['FullName']) && isset($_POST['Address'])) {
    $type = $_POST['Type'];
    $regid = $_POST['RegId'];
    $password = $_POST['Password'];
    $email = $_POST['Email'];
    $mobile = $_POST['Mobile_No.'];
    $fullname = $_POST['FullName'];
    $address = $_POST['Address'];

    // Database connection parameters (modify as needed)
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'hawks';

    // Create a database connection
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check for database connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to update customer details by ID
    $query = "UPDATE Customers SET Type = ?, RegId = ?, Password = ?, Email = ?, Mobile_No. = ?, FullName = ?, Address = ? WHERE Username =?";
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $type, $regid, $password, $email, $mobile, $fullname, $address);

    if ($stmt->execute()) {
        echo "Customer updated successfully.";
    } else {
        echo "Error updating customer: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Customer details not provided.";
}
?>
