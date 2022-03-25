<?php include 'core/queries.php';

/* Call function in queries.php to delete the specified listing by it's id */
if (deleteListing($_GET['id'], $_GET['user']) ) { 
    header("Location: profile.php"); 
} else {
    echo 'There has been an error';
}