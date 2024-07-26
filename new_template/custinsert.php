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
    </style>
</head>
<body>
    <div class="marquee">
        <h1>Street Hawkers Tracking System</h1>
        <marquee><h2><i>Customer Master</i></h2></marquee>
        <h3>INSERT DETAILS</h3>
    </div>
    <center>

    <form method="POST" action="custinsertsave.php">
        <table align="center" cellpadding="10" bgcolor="white">
            <tr>
                <td>Id :</td>
                <td><input type="text" name="D1" /></td>
            </tr>

            <tr>
                <td>Username :</td>
                <td><input type="text" name="D2" /></td>
            </tr>

            <tr>
                <td>Password :</td>
                <td><input type="text" name="D3" /></td>
            </tr>

            <tr>
                <td>Email :</td>
                <td><input type="email" name="D4" /></td>
            </tr>

            <tr>
                <td>Phone_No :</td>
                <td><input type="text" name="D5" /></td>
            </tr>

            <tr>
                <td>FullName :</td>
                <td><input type="text" name="D6" /></td>
            </tr>
            <tr>
                <td>Address :</td>
                <td><input type="text" name="D7" /></td>
            </tr>

            <tr>
                <td colspan="2" class="center-button">
                    <input type="submit" name="Submit" value="Insert" />
                </td>
            </tr>
        </table>
    </form>

    </center>
</body>
</html>
