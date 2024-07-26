<?php
session_start(); // Start the session

if (isset($_POST["signup"])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hawks";

    $conn = mysqli_connect($server, $username, $password, $dbname);

    $name = $_POST['Name'];
    $phone = $_POST['Phone'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $address = $_POST['Address'];
    $category = $_POST['Category'];

    // Exclude "Id" from the INSERT statement because it's auto-increment
    $sql = "INSERT INTO hawkers (Name, Phone, Email, Password, Address, Category) VALUES ('$name', $phone, '$email', '$password', '$address', '$category')";

    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>alert('New Record Inserted Successfully');</script>";

        // Store user data in session variables
        $_SESSION['name'] = $name;
        $_SESSION['phone'] = $phone;

        header("Location: optadd1.php"); // Redirect to the next page
    } else {
        echo "<script type='text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }

    mysqli_close($conn);
}
?>
