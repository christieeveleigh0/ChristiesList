<?php

// Links to scripts
echo '<head>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
     </head>'; 

// Main menu code
echo '<header>
        <nav>
            <a href="index.php">Christies List</a>
            <div>
                <a href="view-all.php">View All Listings</a>
                <a href="create-listing.php">Post Listing</a>';

                if (isset($_SESSION['valid'])) {
                    echo '<a href="profile.php">My profile</a>
                          <a href="registration/logout.php" class="underline">Logout</a>';
                }

echo        '</div>
        </nav>
     </header>';

?>
<script src="js/functions.js"></script>