<?php
session_start();
$conn=mysqli_connect("localhost","root","","mybook") or die(mysql_error());
 mysql_select_db("user");
 $user_name=$_GET['user_name'];
 $password=$_GET['password'];

user_login($conn,$user_name, $password); //added by ATIF

function user_login($conn, $user_name,$password)
{
 $user_name = mysql_real_escape_string($user_name); 
 
 try{ //Change by ATIF
 $sql = mysqli_query($conn,"SELECT * FROM user WHERE user_name='$user_name' AND password='$password'");
 $rows = mysqli_num_rows($sql); 
 
 if($rows<=0)
 {
   
   echo "incorrect user name or password";
 }
 else
 {
  $_SESSION['user_name']=$user_name;
   header('Location:mybook.html');
 }
 }
 catch(Exception $e)
 {
  
 }
}
?>