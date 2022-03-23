<?php

session_start();
require 'core/conn.php'; 
include 'core/queries.php';

$errors = array(); 
$success = array();

if (isset($_POST['create'])) {
    $target_dir = "image/listings/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    
    $title = $conn->real_escape_string($_POST['title']);
    $price = $conn->real_escape_string($_POST['price']);
    $location = $conn->real_escape_string($_POST['location']);
    $category = $conn->real_escape_string($_POST['category']);
    $description = $conn->real_escape_string($_POST['description']);
    
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        array_push($errors, "File is not an image");
        $uploadOk = 0;
      }
    }
    
    // Check if already exists
    if (file_exists($target_file)) {
        array_push($errors, "Sorry, file already exists. Please rename it and try again.");
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        array_push($errors, "Sorry, your file is too large.");
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        array_push($errors, "Your file could not be uploaded.");
      // if everything is ok, try to upload file
      } else {
    
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
           $filepath = $target_file;
        } else {
           $filepath = "image/placeholder.png";
           array_push($errors, "Your file could not be uploaded.");
        }
      }
    
      if (submitListing($title, $price, $location, $category, $description, $filepath)) { array_push($success, "Your listing has been posted!");; }
      else {echo $conn->error; }
}

