<?php

/* Select all listings from database and return them to funciton call.
   There is no need to make this a prepared statement because nothing is being inserted. */
function getAllListings() {
    require 'conn.php';
    return $conn->query("SELECT * FROM listing");
}

/* Select only 4 listings from the database. This is for the top of the Home page */
function getTopListings() {
    require 'conn.php';
    return $conn->query("SELECT * FROM listing LIMIT 4");
}

/* Select a specific listing based on ID */
function getListingById($id) {
    require 'conn.php';
    return $conn->query("SELECT * FROM listing WHERE id=" . $id);
}

/* Select all listings by category */
function getListingsByCategory($category) {
    require 'conn.php';
    return $conn->query("SELECT * FROM listing WHERE category='" . $category . "'");
}

/* Select the last 8 results to display in the Hot section on the Home page. The first 4 listings are 
   dummies and will always be there. */
function getHotListings() {
    require 'conn.php';
    return $conn->query("SELECT * FROM listing WHERE id > 5");
}

/* Select user details by their email. The password is an MD5 Hash for security reasons */
function getHash($email) {
    require 'conn.php';
    return $conn->query("SELECT id, password FROM users WHERE email='" . $email . "'");
}

/* Select the corresponding email address to check if the user has an account or not */
function checkIfRegistered($email) {
    require 'conn.php';
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($result) != 0) { return true; }
    return false;
}

/* Perform a prepared statement for security reasons. Prepare and bind variables.
   On successful insertion, return true */
function registerUser($name, $number, $email, $password) {
    require 'conn.php';
    $query = "INSERT INTO users (name, number, email, password) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $number, $email, $password);
        mysqli_stmt_execute($stmt);
        return true;
    } else {
        echo mysqli_error($link);
        return false;
    }

    mysqli_stmt_close($stmt); // Close connections
    mysqli_close($conn);
}

/* Submit a listing. Perform a prepared statement for security reasons. 
   On success, return true. */
function submitListing($title, $price, $location, $category, $description, $filepath) {
    require 'conn.php';
    $query = "INSERT INTO listing (name, description, location, date, category, image, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
   
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "sssssss", $title, $description, $location, date("Y/m/d"), $category, $filepath, $price);
        mysqli_stmt_execute($stmt);
        return true;
    } else {
        echo mysqli_error($link);
        return false;
    }

    mysqli_stmt_close($stmt); // Close connections
    mysqli_close($conn);
}

/* Select listings posted by a specific user. This is so they can view them on their profile */
function getMyListings($id) {
    require 'conn.php';
    return $conn->query("SELECT * FROM listing WHERE posted_by=" . $id);
}

/* This method is used to check if a listing has been posted by the $_SESSION user */
function getPosterID($listing_id) {
    require 'conn.php';
    $get_id = $conn->query("SELECT posted_by FROM listing WHERE '" . $listing_id . "'=id");

    if ($get_id->num_rows > 0) {
        while ($row = $get_id->fetch_assoc()) {
            return $row['posted_by'];
        }
    }
}