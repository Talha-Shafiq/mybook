<?php
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$user_name=$_POST['user_name'];
$password=md5($_POST['password']);

$servername = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "mybook";
$conn=new mysqli($servername, $dbuser, $dbpassword, $dbname);

if($conn->connect_error)  {
	
	die("connenction failed: " . $conn->connect_error);

}
$sql = "INSERT INTO user (first_name, last_name, user_name, password)
VALUES ('$first_name', '$last_name', '$user_name', '$password')";
if ($conn->query($sql) === TRUE) {
	echo "user registerd";
}
else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>