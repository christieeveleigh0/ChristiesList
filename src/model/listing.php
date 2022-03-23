<?php

/* An abstraction of the html code that holds each listing. This is the small preview of the listing that is shown on index.php
   The $delete flag indicates whether a 'delete' button should be shown or not. This button is only shown on the Profile page. */
function listing($id, $name, $price, $location, $image, $delete) {
    echo '<a href="view-listing.php?id=' . $id . '">
            <div class="listing">
                <img src="' . $image . '" width="290px">
                <div class="description">
                    <h3>' . $name . '</h3><p>R' . $price . '</p>
                    <div class="location">
                        <img src="image/location.png" width="15px">
                        <p>' . $location . '</p>
                    </div>';

                    if ($_SESSION['id'] == getPosterID($id) && $delete == true) {
                        echo '<a class="delete-button">Delete Listing</a>';
                    }
                

 


            echo '</div></div></a>';


}