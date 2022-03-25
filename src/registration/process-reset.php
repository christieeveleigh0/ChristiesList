<?php
session_start();
$errors = array();
$success = array(); 
include '../core/conn.php';
include '../core/queries.php';

if (isset($_POST['reset']) && !empty($_POST['email'])) {

    $email = $conn->real_escape_string($_POST['email']);
    if (checkEmail($email)) {

        // Send email
        $subject = "Christie's List Password Recovery";
        $reset_key = md5(uniqid(rand(), true));
        $reset_link = "http://list.c-e-marx.co.za/registration/new-password.php?k=" . $reset_key;
        $content = "Hi there. A password reset for a Christie's List account was requested with this email, if this was not you please ignore this email. 
                    \n If this was you, <a href='" . $reset_link . "''>click here</a> to reset your password.";

        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: noreply@list.c-e-marx.co.za" . "\r\n";

        if (mail($email, $subject, $content, $headers)) {
            array_push($success, "A password recovery email has been sent to " . $email . ". Please check your spam.");
            
            // Get user ID to add to password reset db
            $user = getUserDetails($email);
            if ($user->num_rows > 0) {
                while($row = $user->fetch_assoc()) {
                    $id = $row['id'];
                }
            }

            //Add reset key to database
            resetKey($id, $reset_key);
        } else {
            array_push($errors, "The password recovery email could not be sent at this time. Please try again later.");
        }
    } else {
        array_push($errors, "The email you entered does not exist.");
    }
}