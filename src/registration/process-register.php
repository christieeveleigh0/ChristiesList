<?php

require '../core/conn.php';
require '../core/queries.php';

$name = $number = $email = $password = $repassword = "";
$errors = array(); 
$success = array();

if (isset($_POST['register'])) {
  
  // Sanitize data
  $name = $conn->real_escape_string($_POST['name']); 
  $number = $conn->real_escape_string($_POST['number']);
  $email = $conn->real_escape_string($_POST['email']);
  $password = $conn->real_escape_string($_POST['password']);
  $repassword = $conn->real_escape_string($_POST['repassword']);

  // Perform error checks
  if (empty($email)) {array_push($errors, "Email is required");}  
  if ($password != $repassword) {array_push($errors, "The two passwords don't match");}

  $checkUserExists = checkIfRegistered($email); // Check if the user already has a profile in the database
  if ($checkUserExists) {array_push($errors, "Email address already exists");}

  if (count($errors) == 0) {
    $hash = password_hash($password, PASSWORD_DEFAULT); // Sanitize password

    // Perform query to add user to database
    if (registerUser($name, $number, $email, $hash)) { 
      array_push($success, "Your account has been created successfully!"); 
    } else {
      echo $conn->error;
    }
 }
}