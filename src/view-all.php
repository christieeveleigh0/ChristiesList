<?php session_start(); include 'menu.php'; include 'core/queries.php'; include 'model/listing.php';?>
<html>
    <body>
        <div class="container">
            <div class="heading">
                <div>
                    <h1>View all listings <img src="image/fruit.png" width="25px"></h1>
                </div>
                <div class="heading-description">
                    <p>View all listings in the Christie's List database. This is a range of all categories.
                       If you would like to post your own listing, be sure to <a href="http://localhost/create-listing.php" class="underline">do so here</a>.
                    </p>
                </div>
            </div>

            <!-- Display all items in a nice, neat table in rows of 4 -->
            <div class="hot-items">
                <table>
                    <?php 
                        $i = 0;
                        $hot_listings = getAllListings();
                            while ($row = $hot_listings->fetch_assoc()) { // Start While
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
                    <?php } // End While ?>

                </table>
            </div>
        </div>
    </body>
    <?php include 'footer.php';?>
</html>