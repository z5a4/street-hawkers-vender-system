<?php
session_start(); // Start a PHP session

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['Username'])) {
    header("Location: form.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        th, td, a {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #007bff;
            cursor: pointer;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>User Profile</h1>
    <?php
    // Display the user's data from the session
    $type = $_SESSION['Type'];
    $username = $_SESSION['Username'];
    $password = $_SESSION['Password'];

    echo '<h2>Records for ' . $username . '</h2>';
    echo '<table>';
    echo '<tr>
            <th>Type</th>
            <th>RegId</th>
            <th>Username</th>
            <th>Password</th>
            <th>Cpassword</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>FullName</th>
            <th>Address</th>
            <th>Questions</th>
            <th>Answers</th>
            <th>Options</th>
        </tr>';

    // Fetch user data from the Registration table based on the session username
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'hawks';

    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check for database connection errors
    if (!$conn) {
        echo "Error Connecting to the Database";
        exit;
    }

    $sql = "SELECT * FROM Registration WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $type = $row['Type'];
            $regid = $row['RegId'];
            $username = $row['Username'];
            $password = $row['Password'];
            $cpassword = $row['Cpassword'];
            $email = $row['Email'];
            $mobile = $row['Mobile_No.'];
            $fullname = $row['FullName'];
            $address = $row['Address'];
            $questions = $row['Questions'];
            $answers = $row['Answers'];

            echo '<tr>';
            echo '<td>' . $type . '</td>';
            echo '<td>' . $regid . '</td>';
            echo '<td>' . $username . '</td>';
            echo '<td>' . $password . '</td>';
            echo '<td>' . $cpassword . '</td>';
            echo '<td>' . $email . '</td>';
            echo '<td>' . $mobile . '</td>';
            echo '<td>' . $fullname . '</td>';
            echo '<td>' . $address . '</td>';
            echo '<td>' . $questions . '</td>';
            echo '<td>' . $answers . '</td>';
            echo '<td><a href="edit.php">Edit</a> | <a href="delete.php">Delete</a></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "No records found for " . $username;
    }

    // Close the database connection
    $conn->close();
    ?>

    <a href="index1.html">Home</a>
</body>
</html>
