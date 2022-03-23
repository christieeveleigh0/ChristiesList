<?php
require 'core/conn.php'; include 'core/queries.php';

// $target_dir = "image/listings/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$title = $conn->real_escape_string($_POST['title']);
$price = $conn->real_escape_string($_POST['price']);
$location = $conn->real_escape_string($_POST['location']);
$category = $conn->real_escape_string($_POST['category']);
$description = $conn->real_escape_string($_POST['description']);
$filepath = "image/placeholder.jpg";


if (submitListing($title, $price, $location, $category, $description, $filepath)) { echo 'SUCCESS';}
else {echo $conn->error; }


// echo $target_file; 

// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// // Check if already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//     && $imageFileType != "gif" ) {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
// }

// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
//   // if everything is ok, try to upload file
//   } else {

//     // $title = $conn->real_escape_string($_POST['title']);
//     // $price = $conn->real_escape_string($_POST['price']);
//     // $location = $conn->real_escape_string($_POST['location']);
//     // $category = $conn->real_escape_string($_POST['category']);
//     // $description = $conn->real_escape_string($_POST['description']);
//     // $filepath = $target_file;

//     // submitListing($title, $price, $location, $category, $description, $filepath);




//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//       echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//     } else {
//       echo "Sorry, there was an error uploading your file.";
//     }
//   }