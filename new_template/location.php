<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hawks";

$Id = isset($_GET['Id']) ? (int)$_GET['Id'] : 0;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve registration data based on the Id
$sql = "SELECT Name, Phone FROM hawkers WHERE Id = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $Id);
    $stmt->execute();
    $stmt->bind_result($name, $phone);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "Error preparing the statement: " . $conn->error;
    exit();
}

if (!$name) {
    echo "No Data found for the provided ID.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #0073e6;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #005bb7;
        }
    </style>
</head>
<body>
    <h2>Welcome, <?php echo $name; ?></h2>
    <p>Fill in additional data:</p>
    <form method="post" action="additional_data.php">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" readonly>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>" readonly>
        <label for="location">Hawker Location:</label>
        <input type="text" id="location" name="location" required>
       

        <br></br>

        <label for="landmark">Hawker Landmark:</label>
        <input type="text" id="landmark" name="landmark">
        <br></br>

        <label for="time">Hawker Operating Time:</label>
        <select id="time" name="time">
            <option value="Morning">8pm-10pm</option>
            <option value="Afternoon">10pm-12pm</option>
            <option value="Evening">12pm-2pm</option>
            <!-- Add more time options as needed -->
        </select>
        <br></br>

        <label for="map_link">Location Map Link:</label>
        <input type="text" id="map_link" name="map_link">
        <br></br>




<button><a href="https://maps.app.goo.gl/rhYp5nFjGCPbJwbY8" target='_blank'>Open Map</a></button>

        <input type="submit" name="submit" value="Submit Additional Data">
    </form>
</body>
</html>
