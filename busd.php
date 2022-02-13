<?php
if (isset($_POST['sub'])){
 require 'includes/dbh.inc.php';


$username=$_POST['uname'];
$passwd=$_POST['psw'];
$username = stripcslashes($username);
$passwd = stripcslashes($passwd);

$sql="SELECT * FROM users WHERE uidUsers='$username' AND pwdUsers='$passwd' ";

$username = mysqli_real_escape_string($conn,$username);
$passwd = mysqli_real_escape_string($conn,$passwd);

$result= mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row['uidUsers'] == $username && $row['pwdUsers'] == $passwd) {
    header('location:includes/bienvenue.inc.php');
}
else{
    header('location:index.html?error=incorrectpswordorusername');
}
}
else{
    header('location:index.html');
}
