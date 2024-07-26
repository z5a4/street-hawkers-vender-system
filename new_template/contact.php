<?php
if(isset($_POST["dropmsg"]))
{
	
$server = "localhost";
$username = "root";
$password = "";
$dbname = "hawks";

$conn = mysqli_connect($server, $username, $password, $dbname);


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];


$sql="INSERT INTO Contact VALUES ('$name','$email',$phone,'$subject','$message')";


if(mysqli_query($conn,$sql)) {

	echo "<script type='text/javascript'>alert('Message Submitted Successfully');</script>";
	
}
else
{
	echo "<script type='text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}
mysqli_close($conn);
}
?>