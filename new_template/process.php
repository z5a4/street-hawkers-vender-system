<?php
$message = ""; // Initialize an empty message variable

if (isset($_POST["submit"])) {
    // Establish a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hawks";

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from the HTML form
    $name = $_POST['name'];
    $contact = $_POST['phone'];
    $location = $_POST['location'];
    $landmark = $_POST['landmark'];
    $time = $_POST['time'];
    $map_link = $_POST['map_link'];

    // Prepare the SQL statement using a prepared statement
    $sql = "INSERT INTO location (h_name, contact, Locationn, landmark, Timee, loc_link) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters
        $stmt->bind_param("ssssss", $name, $contact, $location, $landmark, $time, $map_link);

        // Execute the statement
        if ($stmt->execute()) {
            $message = "Data inserted successfully";
        } else {
            $message = "Error inserting data: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        $message = "Error preparing the statement: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your HTML head content here -->
</head>
<body>
    <!-- Add your HTML body content here -->

    <!-- JavaScript to display the alert message -->
    <script>
        <?php
        if (!empty($message)) {
            echo "alert('$message');";
        }
        ?>
    </script>
</body>
</html>
