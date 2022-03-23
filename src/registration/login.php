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
                <h1>Log in <img src="../image/gem.png"></h1>
                <p class="login-description">Want to post a free ad? Log in to Christie's List in order to post free ads and view your profile. If you don't have an account,
                   be sure to <a href="register.php" class="underline">create one here</a>. If you have forgotten your password,
                   use the links below to form to reset it.
                </p>
            </div> 

            <!-- The form sends to itself so we can get an error check back in real time, without delay. Includes the errors 
                 file which displays a list of errors in a div above the form. Hidden variable 'login' is sent to stop the
                 form checks firing off before we send it. -->
            <div class="form-container">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" autocomplete="off">
                    <?php include('errors.php'); ?>
                    <input type="text" name="email" placeholder="Email Address" required autofocus></br>
                    <i class="fa fa-eye-slash" id="togglePassword" ></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    
                    <input type="hidden" name="login">
                    <input type="submit" value="Login">
                </form>
            </div>

            <div class="registration">
                <p>Don't have an account? <a href="register.php">Sign up</a></p>
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