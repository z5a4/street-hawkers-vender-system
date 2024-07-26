    <?php
    // Database connection parameters
    $servername = "localhost";  // XAMPP default server
    $username = "root";         // XAMPP default MySQL username
    $password = "";             // XAMPP default MySQL password
    $database = "hawks"; // Your database name

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn) {
        echo "Database Connected Successfully";
    }
    else {
        echo "Error Connecting Database";
    }

    // Copy data from source_table to destination_table
    $sql = "INSERT INTO Customers (Id, Username, Password, Email, Phone_No, FullName, Address)
                SELECT RegId, Username, Password, Email, Mobile_No.,FullName, Address FROM Registration";

    if (mysqli_query($conn,$sql)) {
        echo "Data copied successfully!";
    } else {
        echo "Error copying data: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
    ?>

