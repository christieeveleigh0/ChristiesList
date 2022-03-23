<?php
session_start();
$errors = array(); 
include '../core/conn.php';
include '../core/queries.php';

/* Check if variables signifying form has been sent are set. Sanitize user details and check them against the
   details for that email address in the database. If all matches, the user's session variables are set to show
   they are logged in */
if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {

    $email = $conn->real_escape_string($_POST['email']); // Escape any shady characters
    $select_account = getHash($_POST['email']); // Select user id and password to perform check

    if ($select_account->num_rows > 0) {
        $user_details = mysqli_fetch_assoc($select_account);     
        $user_id = $user_details['id'];   
        $hash = $user_details['password'];

        // TODO: 
        if ($hash == password_verify($_POST['password'], $hash)) { 
            $_SESSION['valid'] = 1;
            $_SESSION['timeout'] = time();
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $user_id;
            
            header('location: ../create-listing.php');
            exit();
        } else { 
            array_push($errors, "The password you entered is incorrect"); 
        }
    } else {
        array_push($errors, "This email address does not have a Christies's List Account.");
    }
}