<!DOCTYPE html>
<html>
<head>
  <style>
    body {
    font-family: Arial, sans-serif;
    text-align: center;
    background-color: #f2f2f2;
}

h1 {
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

label, input, select {
    display: flex;
    margin-bottom: 10px;
}

label {
    font-weight: bold;
}

input[type="text"], select {
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
    <title>Add Data</title>
    </head>
<body>

<h1>Add Data</h1>

<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hawks";

// Check if the session variables for name and phone are set
if (isset($_SESSION['name']) && isset($_SESSION['phone'])) {
    $name = $_SESSION['name'];
    $phone = $_SESSION['phone'];
} else {
    // Redirect or handle the case where the session variables are not set
    //header("Location: login.php"); // Redirect to login page or handle the case accordingly
    //exit();
}

// Your database connection code remains the same

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// You don't need to retrieve data from the database based on an ID, as you want to use session variables
?>

<form method="POST" action="process.php">
    <label for="name">Hawker Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>" readonly>
    <label for="contact">Hawker Contact:</label>
    <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" readonly>
    <label for="location">Hawker Location:</label>
    <input type="text" id="location" name="location" required>
    <label for="landmark">Hawker Landmark:</label>
    <input type="text" id="landmark" name="landmark">
    <label for="time">Hawker Operating Time:</label>
    <select id="time" name="time">
        <option value="8am-10am">8am-10am</option>
        <option value="10am-12pm">10am-12pm</option>
        <option value="12pm-2pm">12pm-2pm</option>
        <!-- Add more time options as needed -->
    </select>
    <label for="map_link">Location Map Link:</label>
    <input type="text" id="map_link" name="map_link">
    <button><a href="https://maps.app.goo.gl/rhYp5nFjGCPbJwbY8" target='_blank'>Open Map</a></button>
    <input type="submit" name="submit" value="Submit Additional Data">
</form>
</body>
</html>


