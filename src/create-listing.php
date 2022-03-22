<?php 

session_start(); 
if ($_SESSION['valid'] != true) { // Redirect user to login page if they aren't logged in
    header('location: registration/login.php');
    exit();
}

include 'core/queries.php'; 
include 'menu.php'; 
include 'model/full-listing.php';
?>

<html>
    <!-- Post a listing via the form. This information is sent to the database and inserted via the 
         addListing() query.
    --->
    <div class="container">
        <div class="inner">
            <div class="login-heading">
                <h1>Post listing <img src="../image/gem.png"></h1>
            </div> 

            <form action="process-listing.php" method="post" enctype="multipart/form-data">
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

                <p>Upload a nice picture</p>
                <input type="file" name="fileToUpload" id="fileToUpload">

                <div>
                    SAME MESSAGE BLOCK AS CAYOOTS ADD TEAM MEMBER
                </div>

                <input type="submit" value="Post Listing">
            </form>
        </div>
    </div>
</html>