<?php
// Check if the customer ID is provided in the URL
if (isset($_GET['Username'])) {
    $customerId = $_GET['Username'];
    
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

    // Query to retrieve customer details by ID
    $query = "SELECT * FROM Registration WHERE Username = ?";
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Display a form to update customer details (you can customize this form)
        echo "<h2>Update Customer</h2>";
        echo "<form action='update_customer_process.php' method='POST'>";
        echo "<input type='hidden' name='Username' value='" . $row['RegId'] . "'>";
        echo "Name: <input type='text' name='Type' value='" . $row['Type'] . "' required><br>";
        echo "Name: <input type='text' name='RegId' value='" . $row['RegId'] . "' required><br>";
        echo "Email: <input type='password' name='Pasword' value='" . $row['Password'] . "' required><br>";
        echo "Phone: <input type='email' name='Email' value='" . $row['Email'] . "' required><br>";
        echo "Name: <input type='text' name='Mobile_No.' value='" . $row['Mobile_No.'] . "' required><br>";
        echo "Name: <input type='text' name='FullName' value='" . $row['FullName'] . "' required><br>";
        echo "Name: <input type='text' name='Address' value='" . $row['Address'] . "' required><br>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
    } else {
        echo "Customer not found.";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Customer ID not provided.";
}
?>
