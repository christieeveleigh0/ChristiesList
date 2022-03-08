<?php require 'core/conn.php'; include 'menu.php'; include 'core/queries.php';?>
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

            <?php $listings = getAllListings(); ?>
            <div>
                <span>
                    <h2>Top Listings</h2>
                    <p>View All</p>
                </span>

                <?php 
                
                if ($listings->num_rows > 0) {
                    while($row = $listings->fetch_assoc()) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $description = $row['description'];
                        $tags = $row['tags'];
                        $price = $row['price'];

                      echo '<div class="listing">
                                <img src="image/placeholder.png" width="250px">
                                <div class="description">
                                    <h3>' . $name . '</h3>
                                    <p>' . $description . '</p>
                                </div>
                            </div>';
                    }
                  } else {
                    echo "0 results";
                  }
                
                ?>


            </div>
        </div>
    </body>
    
</html>