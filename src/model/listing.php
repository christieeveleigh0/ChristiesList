<?php

/* An abstraction of the html code that holds each listing. This is the small preview of the listing that is shown on index.php
   The $delete flag indicates whether a 'delete' button should be shown or not. This button is only shown on the Profile page. */
function listing($id, $name, $price, $location, $image, $delete) {
    echo '<a href="view-listing.php?id=' . $id . '">
            <div class="listing">
                <img src="' . $image . '" width="290px">
                <div class="description">
                    <h3>' . htmlspecialchars($name) . '</h3><p>R' . htmlspecialchars($price) . '</p>
                    <div class="location">
                        <img src="image/location.png" width="15px">
                        <p>' . htmlspecialchars($location) . '</p>
                    </div>';

                    $poster_id = getPosterID($id);
                    if ($_SESSION['id'] == $poster_id && $delete == true) {
                        echo '<a href="delete-listing.php?id=' . $id .'&user=' . $poster_id . '" class="delete-button">Delete Listing</a>';
                    }
    echo '      </div>
            </div>
         </a>';


}