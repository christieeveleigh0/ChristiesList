<?php 

session_start(); 
if ($_SESSION['valid'] != true) { // Redirect user to login page if they aren't logged in
    header('location: registration/login.php');
    exit();
}

require 'process-listing.php';
include 'menu.php'; 
include 'model/full-listing.php';
?>

<html>
<body>  
    <!-- Post a listing via the form. This information is sent to the database and inserted via the 
         addListing() query.
    --->
    <div class="container listings-container-inner">
        <div class="inner">
            <div class="login-heading">
                <h1>Post listing <img src="../image/gem.png"></h1>
            </div> 

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
                <?php include('registration/errors.php'); ?>
                <?php include('registration/success.php'); ?>
                <input type="text" name="title" placeholder="Ad Title" required>
                <input type="number" name="price" placeholder="Price in Rands">
                <input type="text" name="location" placeholder="Location">
                <select name="category">
                    <option value="select-category">Select Category</option>
                    <option value="antiques">Antiques</option>
                    <option value="collectables">Collectables</option>
                    <option value="furniture">Furniture</option>
                    <option value="hobbies">Hobbies</option>
                    <option value="appliances">Home Appliances</option>
                    <option value="decor">Home Decor</option>
                </select>
                <textarea id="message" name="description" rows="8" cols="50" placeholder="Description"></textarea>

                <p class="upload-text">Upload a nice picture</p>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="hidden" name="create" value="create">
                <input type="submit" value="Post Listing">
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>