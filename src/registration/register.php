<?php
session_start();
require 'process-register.php'; // Form is automatically sent to this file for error check
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/styles.css"> <!-- This has to be included because the menu links are out of range here -->
        <script src="https://kit.fontawesome.com/74cbc39197.js" crossorigin="anonymous"></script> <!-- Allowing the eye icon in the form -->
    </head>
    <body>
        <header>
            <nav>
                <a href="../index.php">Christies List</a>
                <div>
                    <a>View All Listings</a>
                    <a href="../create-listing.php">Post Listing</a>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="login-heading">
                <h1>Create an account <img src="../image/gem.png"></h1>
                <p class="login-description">Create a Christie's List account so you can post free ads. If you already have an account,
                   you can <a href="login.php" class="underline">log in here</a>.
                </p>
            </div> 

            <!-- The form is sent to process-register.php where an error check can be performed in real time.
                 If the user is sucessful, they will get a success message and can now login. -->
            <div class="form-container">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" autocomplete="off">
                    <?php include('errors.php'); ?>
                    <?php include('success.php'); ?>

                    <input type="text" name="name" placeholder="Full Name" required autofocus>
                    <input type="text" name="email" placeholder="Email Address" required></br>
                    <input type="text" name="number" placeholder="Cell Number"></br>
                    <i class="fa fa-eye-slash" id="togglePassword" ></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <input type="password" name="repassword" placeholder="Re-type Password" required>
                    
                    <input type="hidden" name="register">
                    <input type="submit" value="Create Account">
                </form>
            </div>

            <div class="registration">
                <p>Don't have an account? <a href="create_account.php">Sign up</a></p>
                <p><a href="forgot_password.php">Reset your password</a></p>
            </div>

        </div>

        <!-- <script src="../js/functions.js"></script> -->
        <script>
                const togglePassword = document.querySelector('#togglePassword');
                const password = document.querySelector('#password');
                
                togglePassword.addEventListener('click', function (e) {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);

                    // Toggle the eye / eye slash icons by adding and removing a class
                    this.classList.toggle('fa-eye-slash');
                    this.classList.toggle('fa-eye'); 
                });
        </script>
    </body>
</html>