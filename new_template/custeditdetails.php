<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="author" content="" />
    <title>CUSTOMER MASTER</title>
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

        .error-message {
            background-color: #ffdddd; /* Light red background */
            padding: 5px;
            border: 1px solid #f00; /* Red border */
            color: #f00; /* Red text color */
            font-weight: bold; /* Bold text */
            margin-top: 5px; /* Add some space between error messages and form fields */
        }
    </style>
    <script>
        function validateForm() {
            var username = document.getElementsByName("D2")[0].value;
            var password = document.getElementsByName("D3")[0].value;
            var email = document.getElementsByName("D4")[0].value;
            var phone = document.getElementsByName("D5")[0].value;
            var fullName = document.getElementsByName("D6")[0].value;
            var address = document.getElementsByName("D7")[0].value;
            var isValid = true;

            // Clear previous error messages
            clearErrors();

            // Validate Username (non-empty)
            if (username.trim() === "") {
                showError("Username is required");
                isValid = false;
            }

            // Validate Password (non-empty)
            if (password.trim() === "") {
                showError("Password is required");
                isValid = false;
            }

            // Validate Email (non-empty and valid email format)
            if (email.trim() === "") {
                showError("Email is required");
                isValid = false;
            } else if (!validateEmail(email)) {
                showError("Invalid email format");
                isValid = false;
            }

            // Validate Phone (non-empty and numeric)
            if (phone.trim() === "") {
                showError("Phone Number is required");
                isValid = false;
            } else if (!/^\d+$/.test(phone)) {
                showError("Phone Number should only contain digits");
                isValid = false;
            } else if (phone.length > 10) {
                showError("Phone Number should not exceed 10 digits");
                isValid = false;
            }

            // Validate FullName (non-empty)
            if (fullName.trim() === "") {
                showError("Full Name is required");
                isValid = false;
            }

            // Validate Address (non-empty)
            if (address.trim() === "") {
                showError("Address is required");
                isValid = false;
            }

            return isValid;
        }

        // Helper function to validate email format
        function validateEmail(email) {
            var regex = /\S+@\S+\.\S+/;
            return regex.test(email);
        }

        // Helper function to display error messages
        function showError(message) {
            var errorDiv = document.getElementById("error-message");
            errorDiv.style.display = "block";
            errorDiv.innerHTML += "<div class='error-message'>" + message + "</div>";
        }

        // Helper function to clear error messages
        function clearErrors() {
            var errorDiv = document.getElementById("error-message");
            errorDiv.style.display = "none";
            errorDiv.innerHTML = "";
        }
    </script>
</head>
<body>
    <div class="marquee">
        <h1>Street Hawkers Tracking System</h1>
        <marquee><h2><i>Customer Master</i></h2></marquee>
        <h3>EDIT DETAILS</h3>
    </div>
    <center>
       <?php
    // Database connection parameters
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "hawks";

    // Create a connection to the database
    $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check if the connection was successful
    if (!$con) {
        die("Could not connect to the database: " . mysqli_connect_error());
    }

    // Escape the ID parameter to prevent SQL injection
    $id = mysqli_real_escape_string($con, $_REQUEST['Id']);

    // Query to fetch data
    $sql = "SELECT * FROM Customers WHERE Id='$id'";
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if (!$result) {
        die("Error fetching data from the database: " . mysqli_error($con));
    }

    // Check if data was found
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $D1 = $row['Id'];
        $D2 = $row['Username'];
        $D3 = $row['Password'];
        $D4 = $row['Email'];
        $D5 = $row['Phone_No'];
        $D6 = $row['FullName'];
        $D7 = $row['Address'];
    } else {
        die("No data found for the specified ID.");
    }
    ?>

    <div id="error-message" style="color: red; display: none;"></div>
    <form method="Post" action="custeditsave.php" onsubmit="return validateForm();">
        <table align="center" cellpadding="10" bgcolor="white" style="border:1px solid black" bordercolor="#D7DF01">
            <tr>
                <td>Id :</td>
                <td><input type="text" name="D1" value="<?php echo $D1; ?>" readonly/></td>
            </tr>

            <tr>
                <td>Username :</td>
                <td><input type="text" name="D2" value="<?php echo $D2; ?>" /></td>
            </tr>

            <tr>
                <td>Password :</td>
                <td><input type="text" name="D3" value="<?php echo $D3; ?>" /></td>
            </tr>

            <tr>
                <td>Email :</td>
                <td><input type="email" name="D4" value="<?php echo $D4; ?>" /></td>
            </tr>

            <tr>
                <td>Phone No :</td>
                <td><input type="text" name="D5" value="<?php echo $D5; ?>" /></td>
            </tr>

            <tr>
                <td>FullName :</td>
                <td><input type="text" name="D6" value="<?php echo $D6; ?>" /></td>
            </tr>
            <tr>
                <td>Address :</td>
                <td><input type="text" name="D7" value="<?php echo $D7; ?>" /></td>
            </tr>

            <tr>
                <td colspan="2" class="center-button" align="center">
                    <input type="submit" name="Submit" value="Update" />
                </td>
            </tr>
        </table>
    </form>

    <div align="center">
        <a href="custdeletedetails.php?Id=<?php echo $D1; ?>">Delete Data</a>
    </div>

    <?php
    // Close the database connection
    mysqli_close($con);
    ?>
    </center>
</body>
</html>
