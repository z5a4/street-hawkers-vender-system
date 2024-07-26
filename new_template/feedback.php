<?php
if(isset($_POST["submit"]))
{
	
$server = "localhost";
$username = "root";
$password = "";
$dbname = "hawks";

$conn = mysqli_connect($server, $username, $password, $dbname);


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$suggestion = $_POST['suggestions'];


$sql="INSERT INTO Feedback VALUES ('$name','$email',$phone,'$message','$suggestion')";


if(mysqli_query($conn,$sql)) {

	echo "<script type='text/javascript'>alert('FeedBack Submitted Successfully');</script>";
	
}
else
{
	echo "<script type='text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}
mysqli_close($conn);
}
?>