<?php include 'menu.php'; include 'core/queries.php'; include 'model/listing.php';?>
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
                                listing($row['id'], $row['name'], $row['price'], $row['location']);
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
            <h1>Hot Items</h1>
            <div class="hot-items">
                    
                    <?php
                        $hot_listings = getAllListings();
                        if ($hot_listings->num_rows > 0) {
                            while($row = $hot_listings->fetch_assoc()) {
                                listing($row['id'], $row['name'], $row['price'], $row['location']);
                            }
                        } else {
                        echo '<div>
                                <h3>There are currently no listings. Why dont you <a href="create-listing.php">create one?</a></h3>
                            </div>';
                        }
                    ?>
            </div>
            <div>
                <h1>Categories</h1>
            </div>
        </div>
    </body>
    
</html>