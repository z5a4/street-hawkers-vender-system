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
        <marquee><h2><i>FEEDBACK Data</i></h2></marquee>
    </div>
    <div class="container">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone_No</th>
                <th>Message</th>
                <th>Suggestions</th>
                
            </tr>

<?php

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"hawks");
$sql="select * from Feedback";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
    
    $name=$row['Name'];
    $email=$row['Email'];
    $phone=$row['Phone_No'];
    $message=$row['Message'];
    $suggestions=$row['Suggestions'];
    
    
  ?>

<tr>
<td><?php echo $name;?></td>
<td><?php echo $email;?></td>
<td><?php echo $phone;?></td>
<td><?php echo $message;?></td>
<td><?php echo $suggestions;?></td>


</tr>


<?php
}
mysqli_close($con);
?>
</center>
</body>
</html>
