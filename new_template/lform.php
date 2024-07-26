<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="for.css"> <!-- Your custom CSS file -->
    <? php include 'links/links.php' ?>
</head>
<body>
    <div class="container">
        <h1>Login Form</h1>
        <form action="lform.php" method="POST">
            <div class="form-group">
                <label for="userType">Select Type</label>
                <select id="userType" name="userType" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="Username" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="Password" placeholder="Enter Password" required>
            </div>
            
            <button name="signin" type="submit">Sign In</button>
            <button onclick="window.location.href='index.html'" type="button">Home</button><br><br>
            <a href="Forgot.html" style="color: black">Forgot Password?</a>
        </form>
        <p>Don't have an Account? <a href="Reg.html"> Register Now!</a></p>
    </div>
</body>
</html>

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

        // Insert data into the Login table
        $insertQuery = "INSERT INTO Login VALUES ('$type', '$username', '$password')";
        $conn->query($insertQuery);

        exit;
    } else {
        // Credentials are invalid, display an error message
        echo 'Error: ' . mysqli_error($conn);
    }

    // Close the database connection
    $conn->close();
}
?>
