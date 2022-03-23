<?php
require 'core/conn.php';
require 'core/queries.php';

$listing_id = $_POST['listing-id'];

if (isset($_POST['send']) && !empty($_POST['email'])) {

    // Sanitize sent data and get listing poster's email address
    $sender_address = $conn->real_escape_string($_POST['email']);
    $posters_address = getPostersAddres($listing_id);

    $sender_name = $conn->real_escape_string($_POST['name']);
    $sender_number = $conn->real_escape_string($_POST['number']);
    $sender_message = $conn->real_escape_string($_POST['message']);

    // Get details of listing to share with the recipient
    $listing = getListingById($listing_id);
    if ($listing->num_rows > 0) {
        while($row = $listing->fetch_assoc()) {
            $listing_name = $row['name'];
            $listing_description = $row['description'];
        }
    }

    // Send email
    $subject = "Listing Enquiry | " . $listing_name;
    $content = "Hello. A user has enquired about your listing: " . $listing_name . ".\n
                Name: " . $sender_name . "\n
                Number: ". $sender_number . "\n
                Message: " . $sender_message . "\n
                
                Kind Regards, The Christie's List Team";

    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: noreply@list.c-e-marx.co.za/" . "\r\n";

    if (mail($posters_address, $subject, $content, $headers)) {
        array_push($success, "A password recovery email has been sent to " . $address . ". Please check your spam.");
    } else {
        array_push($errors, "The password recovery email could not be sent at this time. Please try again later.");
    }
}