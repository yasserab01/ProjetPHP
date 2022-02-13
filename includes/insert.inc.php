<?php
// Include the database configuration file
include 'dbh.inc.php';
$statusMsg = '';

// File upload path
$targetDir = "../images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$CNE = $_POST['cnenum'];
$firstn = $_POST['first'];
$lastn = $_POST['last'];
$email = $_POST['mail'];

if(isset($_POST["upload"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf','jfif');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into studens11 (CNE,firstname,lastname,email,photo) VALUES ('$CNE','$firstn','$lastn','$email','$targetFilePath')");
            header('location:bienvenue.inc.php');
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>