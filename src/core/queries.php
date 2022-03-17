<?php

// $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
// $stmt->bind_param("sss", $firstname, $lastname, $email);
// $firstname = "John";
// $lastname = "Doe";
// $email = "john@example.com";
// $stmt->execute();
// $stmt->close();
// $conn->close();


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

/* Select the last 8 results to display in the Hot section on the Home page. The first 4 listings are dummies and will always be there. */
function getHotListings() {
    require 'conn.php';
    return $conn->query("SELECT * FROM listing WHERE id > 5");
}

/* Select user details by their email. The password is an MD5 Hash for security reasons */
function getHash($email) {
    require 'conn.php';
    return $conn->query("SELECT id, password FROM users WHERE email='" . $email . "'");
}

