<?php

session_start();
include '../core/conn.php';
include '../core/queries.php';

if (isset($_GET['k'])) { $reset_key = $conn->real_escape_string($_GET['k']);} 
else { $reset_key = $conn->real_escape_string($_POST['k']);}

$errors = array(); 
$success = array();

$user_id = getUID($reset_key);

if (isset($_POST['reset-password']) && !empty($_POST['password']) && !empty($_POST['repassword'])) {
    $password = $conn->real_escape_string($_POST['password']);    
    $repassword = $conn->real_escape_string($_POST['repassword']); 

    // Error checking
    if ($repassword != $password) {array_push($errors, "The two passwords do not match");}
    if (empty($password)) {array_push($errors, "Password is required");}

    // If all is good, reset password in database
    if (count($errors) == 0) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        if (resetPassword($hash, $user_id)) { array_push($success, "Your password has been updated successfully. Please <a href='login.php'>Log in</a>."); } 
        else { array_push($errors, "Password update failed: " . $conn->error); }
    }
}
?>

<html>
    <head>
        <meta name="robots" content="noindex"> <!-- Hide from search engines -->
        <link rel="stylesheet" href="../css/styles.css"> <!-- This has to be included because the menu links are out of range here -->
        <script src="https://kit.fontawesome.com/74cbc39197.js" crossorigin="anonymous"></script> <!-- Allowing the eye icon in the form -->
    </head>
    <header>
            <nav>
                <a href="../index.php">Christies List</a>
                <div>
                    <a>View All Listings</a>
                    <a href="../create-listing.php">Post Listing</a>
                </div>
            </nav>
    </header>

  <body>
        <div class="container">
            <div class="login-heading">
                    <h1>Enter new password <img src="../image/gem.png"></h1>
                    <p class="login-description">Enter your new password in the form below to finish resetting your password
                    </p>
            </div> 
            <div class="form-container">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" autocomplete="off">
                    <?php include('errors.php'); ?> 
                    <?php include('success.php'); ?>

                    <i class="fa fa-eye-slash" id="togglePassword"></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <input type="password" name="repassword" id="repassword" placeholder="Confirm New Password" required>
                    <input type="hidden" name="k" value="<?php echo $reset_key; ?>">
                    
                    <input type="hidden" name="reset-password">
                    <input type="submit" value="Reset Password">
                </form>
            </div>
            
            <div class="registration">
                <h3>Know your password? <a href="login.php">Log in</a></h3>
            </div>
        </div>

        <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', function (e) {
                console.log("HEYA");
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // toggle the eye / eye slash icon
                this.classList.toggle('fa-eye-slash');
                this.classList.toggle('fa-eye'); 
            });
        </script>
    </body>
</html>