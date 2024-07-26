<!DOCTYPE HTML>
<html>
<head>
    <title>CUSTOMER MASTER</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
            margin-top: 20px;
        }

        .header {
            background-color: #333;
            color: white;
            padding: 10px;
        }

        .header h1 {
            margin: 0;
            text-align: center;
        }

        .marquee {
            background-color: #ffcc00;
            padding: 10px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Street Hawkers Tracking System</h1>
    </div>
    <div class="marquee">
        <marquee><h2><i>Customer Data</i></h2></marquee>
    </div>
    <div class="container">
        <table>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Phone_No</th>
                <th>FullName</th>
                <th>Address</th>
            </tr>
           <?php

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"hawks");
$sql="select * from Customers";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
    $id=$row['Id'];
    $username=$row['Username']; 
    $password=$row['Password'];
    $email=$row['Email'];
    $phone=$row['Phone_No'];
    $fullname=$row['FullName'];
    $address=$row['Address'];
    
  ?>

<tr>
<td><?php echo $id;?></td>
<td><?php echo $username;?></td>
<td><?php echo $password;?></td>
<td><?php echo $email;?></td>
<td><?php echo $phone;?></td>
<td><?php echo $fullname;?></td>
<td><?php echo $address;?></td>


<td><a href="custeditdetails.php?Id=<?php echo $id;?>">Edit</a></td>
</tr>


<?php
}
mysqli_close($con);
?>
        </table>
    </div>
</body>
</html>
