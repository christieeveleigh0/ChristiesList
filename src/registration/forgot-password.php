<?php
session_start();
require 'process-reset.php'; // Form is automatically sent to this file for error check
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
                <h1>Reset your password <img src="../image/gem.png"></h1>
                <p class="login-description">Forgot your password? You can reset it with the form below by filling in your email address. You will recieve an email shortly.
                </p>
            </div> 

            <!-- The form sends to itself so we can get an error check back in real time, without delay. Includes the errors 
                 file which displays a list of errors in a div above the form. Hidden variable 'login' is sent to stop the
                 form checks firing off before we send it. -->
            <div class="form-container">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" autocomplete="off">
                    <?php include('errors.php'); ?>
                    <?php include('success.php'); ?>
                    <input type="text" name="email" placeholder="Email Address" required autofocus></br>
                    <input type="hidden" name="reset">
                    <input type="submit" value="Reset">
                </form>
            </div>

            <div class="registration">
                <p>Don't have an account? <a href="register.php">Sign up</a></p>
                <p><a href="login.php">Log back in</a></p>
            </div>

        </div>
    </body>
</html>