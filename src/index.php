<?php session_start(); include 'menu.php'; include 'core/queries.php'; include 'model/listing.php';?>
<html>
    <body>
        <div class="container">
            <div class="heading">
                <div>
                    <h1>Find beautiful second-hand gems in your area <img src="image/gem.png"></h1>
                </div>
                <div class="heading-description">
                    <p>Welcome to Christie's List. This is an online marketplace where you can browse for 
                       exciting vintage and pre-loved furniture and home goods. Use the categories below 
                       to browse, or view our latest listings.
                    </p>
                </div>
            </div>

            <div class="listings-container">
                <!-- Select all listings in the database from function in queries.php. Put them into a model-type class that
                     echos each listing out onto the page. If there are no listings, display error prompt -->
                <div class="listings-container-inner">
                    <?php 
                        $listings = getTopListings(); 
                        if ($listings->num_rows > 0) {
                            while($row = $listings->fetch_assoc()) {
                                listing($row['id'], $row['name'], $row['price'], $row['location'], $row['image'], false);
                            }
                        } else {
                        echo '<div>
                                <h3>There are currently no listings. Why dont you <a href="create-listing.php">create one?</a></h3>
                            </div>';
                        }
                    ?>
                </div>
            </div>
            <div class="safety-banner">
                    <div>
                        <h2>Best Safety Practices</h2>
                        <h1>Staying safe while trading</h1>
                    </div>
                    <button>Learn More</button>
            </div>

            <!-- Display items in a nice, neat table with 4 rows. Iterating over sql results as they are being displayed as 
                 a Listing model. Display 8 listings only and move them over the the next row after 4 have been displayed -->
            <h1 class="title">Hot Items <img src="image/hot.png" width="25px"></h1>
            <div class="hot-items">
                <table>
                    <?php 

                        $i = 0;
                        $u = 0;
                        $hot_listings = getHotListings();
                            while ($row = $hot_listings->fetch_assoc()) { // Start While
                                $i++;
                                $u++;      
                    ?>

                    <td>
                    <?php
                        listing($row['id'], $row['name'], $row['price'], $row['location'], $row['image'], false);

                        if ($u > 7) {
                            break;
                        }
                        
                        if ($i > 3) {
                            echo "</tr><tr>";
                            $i = 0;
                        }
                    ?>
                    </td>
                    <?php } // End While ?>

                </table>
            </div>
            <h1 class="title">Categories <img src="image/categories.png" width="30px"></h1>
            <div class="category">
                <div class="categories">
                    <a href="category.php?type=antiques"><div class="category-1"><h3>Antiques</h3></div></a>
                    <a href="category.php?type=furniture"><div class="category-3"><h3>Furniture</h3></div></a>
                    <a href="category.php?type=collectables"><div class="category-2"><h3>Collectables</h3></div></a>
                </div>
                <div class="categories">
                    <a href="category.php?type=hobbies"><div class="category-4"><h3>Hobbies</h3></div></a>
                    <a href="category.php?type=appliances"><div class="category-5"><h3>Home Appliances</h3></div></a>
                    <a href="category.php?type=decor"><div class="category-6"><h3>Home Decor</h3></div></a>
                </div>
            </div>
        </div>
    </body>
    <?php include 'footer.php';?>
</html>