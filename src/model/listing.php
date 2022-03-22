<?php

/* An abstraction of the html code that holds each listing. This is the small preview of the listing that is shown on index.php
   This is for neatness, maintainability and testing purposes. */
function listing($id, $name, $price, $location, $image) {
    echo '<a href="view-listing.php?id=' . $id . '">
            <div class="listing">
                <img src="' . $image . '" width="290px">
                <div class="description">
                    <h3>' . $name . '</h3><p>R' . $price . '</p>
                    <div class="location">
                        <img src="image/location.png" width="15px">
                        <p>' . $location . '</p>
                    </div>
                </div>
            </div>
          </a>';
}