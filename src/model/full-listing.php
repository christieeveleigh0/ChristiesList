<?php

/* A fully-detailed listing. This is to show all details on view-listing.php. 
   This is for neatness, maintainability and testing purposes. */
function fullListing($id, $name, $description, $price, $date, $location, $image) {
    echo '<div class="full-listing">
                <img src="' . $image . '" width="600px">
                <div class="full-description">
                    <div class="full-description-price">
                        <div>
                            <h4>' . $name . '</h4>
                            <p>Posted: ' . $date . '</p>
                        </div>
                        <h4>R' . $price . '</h4>
                    </div>
                    

                    <p>' . $description . '</p>
                    <div class="location">
                        <img src="image/location.png" width="15px">
                        <p>' . $location . '</p>
                    </div>
                </div>    
          </div>';
}