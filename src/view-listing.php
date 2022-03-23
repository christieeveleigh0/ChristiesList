<?php session_start(); require 'send-enquiry.php';  include 'menu.php'; include 'model/full-listing.php'; ?>

<html>
    <!-- Display an individual listing by calling the method in queries.php that displays
         a specific listing. Then create a 'model' of this listing and echo it out to the page.--->
    <div class="container">
        <div class="side-by-side">
            <div class="listing-side">
                <?php 
                    $listings = getListingById($_GET['id']); 
                    if ($listings->num_rows > 0) {
                        while($row = $listings->fetch_assoc()) {
                            fullListing($row['id'], $row['name'], $row['description'], $row['price'], $row['date'], $row['location'], $row['image']);
                    }
                    } else {
                    echo '<div>
                            <h3>There is no listing with this ID</a></h3>
                        </div>';
                    }
                ?>
            </div>
            <div>
                <p>Message User</p>
                <?php include('registration/errors.php'); ?>
                <?php include('registration/success.php'); ?>
                <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>" method="post">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="text" name="email" placeholder="Email Address" required>
                    <input type="text" name="number" placeholder="Cellphone Number">
                    <textarea id="message" name="message" rows="8" cols="50" placeholder="Message"></textarea>
                    <input type="hidden" name="listing-id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="send" value="send">
                    <input type="submit">
                </form>
            </div>
        </div>
    </div>
</html>