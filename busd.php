<?php
if (isset($_POST['sub'])){
 require 'includes/dbh.inc.php';


$username=$_POST['uname'];
$passwd=$_POST['psw'];
$passwdr=$_POST['pswr'];

$sql="SELECT uidUsers,pwdUsers FROM users WHERE uidUsers='$username' AND pwdUsers='$passwd' ";

$result= mysqli_query($conn,$sql);
if(isset($result)){
    header('location:includes/bienvenue.inc.php');
}
else{
    header('location:index.html');
}
}