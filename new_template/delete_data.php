<?php
// Check if the customer ID is specified in the URL
if (isset($_GET['RegId'])) {
    // Get the customer ID from the URL
    $customer_id = $_GET['RegId'];

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

    // Query to delete the record by customer ID
    $query = "DELETE FROM Registration WHERE RegId = ?";
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $customer_id);

    if ($stmt->execute()) {
        echo "Customer record with ID $customer_id deleted successfully.";
    } else {
        echo "Error deleting customer record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Customer ID not specified in the URL.";
}
?>
