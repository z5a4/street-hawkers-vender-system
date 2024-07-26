<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="author" content="" />
    <title>HAWKER MASTER</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        center {
            text-align: center;
        }

        .marquee {
            background-color: #ffcc00;
            padding: 10px;
        }

        h1 {
            color: white;
            background-color: #333;
            text-align: center;
        }

        h3 {
            text-align: center;
        }

        table {
            width: 500px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            border: 1px solid black;
        }

        td {
            padding: 10px;
            text-align: left;
        }

        input[type="text"],
        input[type="email"] {
            width: 300px;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .center-button {
            text-align: center;
        }

        select {
            width: 300px;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="marquee">
        <h1>Street Hawkers Tracking System</h1>
        <marquee><h2><i>INSERT DETAILS</i></h2></marquee>
    </div>
    <center>
<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hawks";

// Check if the session variables for name and phone are set
if (isset($_SESSION['Name']) && isset($_SESSION['Password'])) {
    $name = $_SESSION['Name'];
    $phone = $_SESSION['Password'];
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
    <form method="POST" action="hawkinsertsave.php">
        <table align="center" cellpadding="10" bgcolor="white">
            <tr>
                <td>Name :</td>
                <td><input type="text" name="D1" value="<?php echo $name; ?>" readonly/></td>
            </tr>

            <tr>
                <td>Password :</td>
                <td><input type="text" name="D2" value="<?php echo $password; ?>" readonly/></td>
            </tr>

            <tr>
                <td>Contact No :</td>
                <td><input type="text" name="D3" /></td>
            </tr>

            <tr>
                <td>Location :</td>
                <td><input type="email" name="D4" /></td>
            </tr>

            <tr>
                <td>Landmark :</td>
                <td><input type="text" name="D5" /></td>
            </tr>

            <tr>
                <td>Time :</td>
                <td>
                    <select name="D6">
                        <option value="8am-10am">8am-10am</option>
                        <option value="10am-12pm">10am-12pm</option>
                        <option value="12pm-2pm">12pm-2pm</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Location Link :</td>
                <td><input type="text" name="D7" /></td>
            </tr>

            <tr>
                <td colspan="2" class="center-button">
                    <input type="submit" name="Submit" value="Insert" />
                </td>
            </tr>
        </table>
    </form>

    <button onclick="window.location.href='https://maps.app.goo.gl/rhYp5nFjGCPbJwbY8'">Open Map</button>

    </center>
</body>
</html>
