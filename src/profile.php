<?php 
session_start();
if ($_SESSION['valid'] != true) { // Redirect user to login page if they aren't logged in
    header('location: registration/login.php');
    exit();
} 

include 'menu.php'; 
include 'core/queries.php'; 
include 'model/listing.php';
?>
<style>h1 {font-size: 24px;} .location {margin-bottom: 30px;}</style>
<html>
    <body>
        <div class="container">
            <div class="heading">
                <div>
                    <h1>Hello, <?= $_SESSION['email']?> <img src="image/hibiscus.jpg" width="25px"></h1>
                </div>
                <div class="heading-description">
                    <p>This is your profile, where you can view all of your listings, and delete listings you no longer want. You can also use this link to 
                        <a href="http://localhost/create-listing.php" class="underline">post a new listing</a>.
                    </p>
                </div>
            </div>
                <!-- Display category listings in a nice, neat table with 4 rows -->
                <div class="listings-container-inner">
                    <table>
                        <?php 
                            $i = 0;
                            $listings = getMyListings($_SESSION['id']);
                            if ($listings->num_rows > 0) {
                                while ($row = $listings->fetch_assoc()) {
                                    $posted_by = $row['posted_by'];
                                    $i++;
                        ?>
                        
                        <td>

                        <?php
                            listing($row['id'], $row['name'], $row['price'], $row['location'], $row['image'], true);
                            if ($i > 3) {
                               echo "</tr><tr>";
                                $i = 0;
                            }
                        ?>
                        </td>
                        <?php }} ?>

                    </table>
            </div>
        </div>

        <?php include 'footer.php'; ?>
</body>
</html>