<?php

/* A fully-detailed listing. This is to show all details on view-listing.php. 
   This is for neatness, maintainability and testing purposes. */
function fullListing($id, $name, $description, $price, $date, $location, $image) {
    echo '<div class="full-listing">
                <img src="' . $image . '" width="600px">
                <div class="full-description">
                    <div class="full-description-price">
                        <div>
                            <h4>' . htmlspecialchars($name) . '</h4>
                            <p>Posted: ' . htmlspecialchars($date) . '</p>
                        </div>
                        <h4>R' . htmlspecialchars($price) . '</h4>
                    </div>
                    

                    <p>' . htmlspecialchars($description) . '</p>
                    <div class="location">
                        <img src="image/location.png" width="15px">
                        <p>' . htmlspecialchars($location) . '</p>
                    </div>
                </div>    
          </div>';
}