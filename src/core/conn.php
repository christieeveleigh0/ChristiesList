<?php

/* Connect to Adminer database, run off MySQL container */
$conn = new mysqli("db", "root", "example", "listings");
if (!$conn) { die("Connection failed: " . mysqli_connect_error());}