<?php
session_start(); // Start a session

if (isset($_POST["signin"])) {

if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] === 'Admin') {
        header("Location: index2.html");
        exit();
    } else {
        header("Location: index1.html");
        exit();
    }
}

// Database connection settings (update with your database credentials)
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'hawks';

// Establish a database connection
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle the login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['Type'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Validate user credentials (You should use proper password hashing)
    $sql = "SELECT Type FROM `Registration` WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $_SESSION['type'] = $type;

        // Redirect to the respective interface
        if ($type === 'admin' && $type === 'customer') {
           $sql2="INSERT into `Login` values('$type','$username','$password')";
           if(mysqli_query($conn,$sql2))
           {
           echo "<script>alert('Data Inserted Succesfully. ');</script>";
             
           }
          
        } 
        if ($type === 'Admin') {
            header("Location: index2.html");
            exit();
        } else {
            header("Location: index1.html");
            exit();
        }
    }  else
    {
        echo "<script>alert('Invalid Username or Password ');</script>";
        header("Location: form.html");
    }
}
        
    
    
   
mysqli_close($conn);
}
?>