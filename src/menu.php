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
                    echo '<a onclick="showMenu()" class="ellipse">
                            <img src="image/user.png" width="25px">
                          </a>
                          
                          <div id="teams-dropdown" class="teams-dropdown" >
                            <a href="create_team.php" class="options-button">My Listings</a>
                            <a href="view_teams.php" class="options-button">Log Out</a>
                          </div>';
                }

echo        '</div>
        </nav>
     </header>';

?>
<script src="js/functions.js"></script>