<?php

/* A fully-detailed listing. This is to show all details on view-listing.php. This is for neatness, maintainability and testing purposes. */
function fullListing($id, $name, $description, $tags, $price, $date, $location) {
    echo '<a href="view-listing.php?id=' . $id . '">
            <div class="full-listing">
                <img src="image/placeholder.png" width="500px">
                <div class="full-description">
                    <div class="full-description-price">
                        <div>
                            <h3>' . $name . '</h3>
                            <p>Posted: ' . $date . '</p>
                        </div>
                        <p>R' . $price . '</p>
                    </div>
                    

                    <p>' . $description . '</p>
                    <div class="location">
                        <img src="image/location.png" width="15px">
                        <p>' . $location . '</p>
                    </div>

                    <span>' . $tags . '</span>
                </div>
            </div>
          </a>';
}