<?php require 'core/conn.php'; include 'menu.php'; include 'core/queries.php'; include 'model/listing.php';?>
<html>
    <body>
        <div class="container">
            <div class="categories">
                <h2>Categories</h2>
                <a href="category.php?type=antique">Antiques</a>
                <a href="category.php?type=appliance">Appliances</a>
                <a href="category.php?type=arts">Arts & Crafts</a>
                <a href="category.php?type=beauty">Beauty</a>
                <a href="category.php?type=books">Books</a>
                <a href="category.php?type=collectibles">Collectibles</a>
                <a href="category.php?type=farm">Farm & Garden</a>
                <a href="category.php?type=furniture">Furniture</a>
                <a href="category.php?type=garage">Garage Sale</a>
                <a href="category.php?type=general">General</a>
                <a href="category.php?type=household">Household</a>
            </div>
            <div>
                <span>
                    <h2>Top Listings</h2>
                    <p>View All</p>
                </span>

                <!-- Select all listings in the database from function in queries.php. Put them into a model-type class that
                     echos each listing out onto the page. If there are no listings, display error prompt -->
                <div class="listings-container">
                    <?php 
                        $listings = getAllListings(); 
                        if ($listings->num_rows > 0) {
                            while($row = $listings->fetch_assoc()) {
                                listing($row['id'], $row['name'], $row['description'], $row['price']);
                        }
                    } else {
                        echo '<div>
                                <h3>There are currently no listings. Why dont you <a href="create-listing.php">create one?</a></h3>
                            </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
    
</html>