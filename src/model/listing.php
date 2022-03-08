<?php

/* An abstraction of the html code that holds each listing. This is for neatness, maintainability and testing purposes. */
function listing($id, $name, $description, $price) {
    echo '<a href="view-listing.php?id=' . $id . '">
            <div class="listing">
                <img src="image/placeholder.png" width="250px">
                <div class="description">
                    <h3>' . $name . '</h3><p>R' . $price . '</p>
                    <p>' . $description . '</p>
                </div>
            </div>
          </a>';
}