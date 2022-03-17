<?php

session_start();
// include '../core/conn.php';
// include '../core/queries.php';
$errors = array(); 

if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    array_push($errors, "Error test");
    // $email = $conn->real_escape_string($_POST['email']);
    // $check_password = getHash($email);

    // if ($check_password->num_rows > 0) {
    //     $user_details = mysqli_fetch_assoc($check_password);        
    //     $hash = $user_details['password'];
    //     $username = $user_details['username'];
    //     $user_id = $user_details['id'];

    //     // Some users don't have a password
    //     if ($hash != '') {
    //        if (password_verify($_POST['password'], $hash)) { 
    //             $_SESSION['valid'] = 1;
    //             $_SESSION['timeout'] = time();
    //             $_SESSION['admin'] = false;
    //             $_SESSION['username'] = $username;
    //             $_SESSION['user_id'] = $user_id;
  
    //             if ($status == 2) {
    //                 $_SESSION['admin'] = true;
    //             } 
                
    //             header('location: ../home.php');
    //             exit();
    //         } else { array_push($errors, "The password you entered is incorrect"); }
    //     } else { array_push($errors, "Sorry, you do not have access to the admin tool."); }

    // } else {
    //     array_push($errors, "The email address you entered does not exist");
    // }
}
?>