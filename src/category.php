<?php session_start(); include 'menu.php'; include 'core/queries.php'; include 'model/listing.php';?>
<html>
    <body>
        <div class="container">
            <div class="heading">
                <div>
                    <h1>View all <?= $_GET['type'] ?> <img src="image/collectible.png" width="30px"></h1>
                </div>
                <div class="heading-description">
                    <p>Browse all <i><?= $_GET['type'] ?></i> on Christie's List. If you have items you would like to sell 
                       be sure to post them by creating a Free ad. You can do so <a href="http://localhost/create-listing.php" class="underline">
                       by clicking the 'Post Listing' button</a>.
                    </p>
                </div>
            </div>
                <!-- Display category listings in a nice, neat table with 4 rows -->
                <div class="listings-container-inner">
                    <table>
                        <?php 
                            $i = 0;
                            $listings = getListingsByCategory($_GET['type']);
                            if ($listings->num_rows > 0) {
                                while ($row = $listings->fetch_assoc()) {
                                    $i++;
                        ?>
                        
                        <td>

                        <?php
                            listing($row['id'], $row['name'], $row['price'], $row['location'], $row['image']);
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
</body>
</html>