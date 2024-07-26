<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Street Hawkers Tracking System</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #333;
            color: white;
            padding: 10px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        .marquee {
            background-color: #ccc;
            padding: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .operations-dropdown {
            margin-top: 3em; /* Adjust the margin as needed */
        }

        .operations-dropdown label {
            font-weight: bold;
            display: block;
        }

        .operations-dropdown select {
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            width: 100%;
            max-width: 200px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Street Hawkers Tracking System</h1>
        <a href="#">Home</a>
        <a href="index.html">Logout</a>
    </div>

    <div class="marquee">
        <marquee behavior="scroll" direction="left">
            <h2>Hawker Details</h2>
        </marquee>
    </div>

    <?php
    session_start();

    // Check if the hawker is authenticated (you should have your own authentication logic)
    if (isset($_SESSION['Name'])) {
        // Database connection settings
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hawks";

        // Create a database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve the hawker's name from the session
        $name = $_SESSION['Name'];

        // SQL query to select records for the authenticated hawker
        $sql = "SELECT * FROM location WHERE h_name = '$name'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<h2>Records for ' . $name . '</h2>';
            echo '<table>';
            echo '<tr>
                <th>Name</th>
                <th>Password</th>
                <th>Contact No</th>
                <th>Location</th>
                <th>Landmark</th>
                <th>Time</th>
                <th>Location Link</th>
                </tr>';

            while ($row = $result->fetch_assoc()) {
                $name = $row['h_name'];
                $password = $row['password'];
                $contact = $row['contact'];
                $location = $row['Locationn'];
                $landmark = $row['landmark'];
                $time = $row['Timee'];
                $loc_link = $row['loc_link'];

                echo '<tr>';
                echo '<td>' . $name . '</td>';
                echo '<td>' . $password . '</td>';
                echo '<td>' . $contact . '</td>';
                echo '<td>' . $location . '</td>';
                echo '<td>' . $landmark . '</td>';
                echo '<td>' . $time . '</td>';
                echo '<td>' . $loc_link . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo "No records found for " . $name;
        }

        // Close the database connection
        $conn->close();
    } else {
        // If not authenticated, redirect to the login page
        header("Location: Hform.html");
        exit();
    }
    ?>

    <div class="operations-dropdown">
        <label for="operations">Select an Operation:</label>
        <select id="operations" name="operations" onchange="redirectToOperation()">
            <option value="option">Select Option</option>
            <option value="insert">Insert</option>
            <option value="update">Update</option>
            <option value="delete">Delete</option>
        </select>
    </div>

    <script>
        function redirectToOperation() {
            var selectedOperation = document.getElementById("operations").value;

            // You can add your logic here to redirect to the selected operation PHP file
            if (selectedOperation === "insert") {
                window.location.href = "hawkinsert.php"; // Replace with the actual filename
            } else if (selectedOperation === "update") {
                window.location.href = "update.php"; // Replace with the actual filename
            } else if (selectedOperation === "delete") {
                window.location.href = "delete.php"; // Replace with the actual filename
            }
        }
    </script>
</body>
</html>
