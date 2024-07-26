<?php
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

// Query to retrieve all customer records from the Customers table
$query = "SELECT * FROM Registration";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Display the customer records in a table
    echo "<h2>Customer Records</h2>";
    echo "<table border='1'>
    <tr>
        <th>Type</th>
        <th>RegId</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Mobile_No.</th>
        <th>FullName</th>
        <th>Address</th>
        <th>Questions</th>
        <th>Answers</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['RegId'] . "</td>";
        echo "<td>" . $row['Username'] . "</td>";
        echo "<td>" . $row['Password'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Mobile_No.'] . "</td>";
        echo "<td>" . $row['FullName'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['Questions'] . "</td>";
        echo "<td>" . $row['Answers'] . "</td>";
        echo "<td><a href='update_data.php?RegId=" . $row['RegId'] . "'>Update</a> | <a href='delete_data.php?id=" . $row['RegId'] . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No customer records found.";
}

// Close the database connection
$conn->close();
?>
