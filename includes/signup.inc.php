<?php
if (isset($_POST['signup'])){
 require 'dbh.inc.php';


$username=$_POST['uname'];
$email=$_POST['mail'];
$passwd1=$_POST['psw'];
$passwdr=$_POST['pswr'];

$sql="INSERT INTO users (uidUsers,emailusers,pwdUsers) Values ('$username','$email','$passwd1')";

$result= mysqli_query($conn,$sql);
if(isset($result)){
   header('location:../index.html');
}

}