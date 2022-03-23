<?php session_start(); include 'menu.php'; include 'core/queries.php'; include 'model/listing.php';?>
<html>
    <style>footer {position: fixed; bottom: 0; width: 97%;}</style>
    <body>
        <div class="container">
            <div class="heading">
                <div>
                    <h1>About Christie's List <?= $_GET['type'] ?> <img src="image/collectible.png" width="30px"></h1>
                </div>
                <div class="heading-description">
                    <p>Christie's List was created by <a href="https://c-e-marx.co.za/" class="underline">developer Christie Marx</a> as a college project for her studies
                       at WeThinkCode. It is built with pure PHP, SQL, JavaScript, HTML and CSS. It implements PHPUnit for Unit Testing and can run offline in a Docker container.
                    </p>
                    <br>
                    <p><strong>Unavailable functionality</strong></p>
                    <p> Some functionality for Christie's List is unavailable in the Docker container. These features are uploading an image when posting a listing, and
                       messaging via the contact form. To demo these features, <a href="http://list.c-e-marx.co.za/" class="underline">view the live site here.</a>
                    </p>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
</body>
</html>