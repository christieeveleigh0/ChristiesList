<?php require 'core/conn.php';

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
    require 'core/conn.php';
    return $conn->query("SELECT * FROM listing");
}

/* Select only 4 listings from the database. This is for the top of the Home page */
function getTopListings() {
    require 'core/conn.php';
    return $conn->query("SELECT * FROM listing LIMIT 4");
}

/* Select a specific listing based on ID */
function getListingById($id) {
    require 'core/conn.php';
    return $conn->query("SELECT * FROM listing WHERE id=" . $id);
}