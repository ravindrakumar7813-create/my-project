<?php
session_start(); // Start the session
include "db.php"; // Include the database connection

// Define the inactivity timeout in seconds (60 seconds)
$inactive_timeout = 60;

// Check if the user is logged in by verifying if email is set in session
if (!isset($_SESSION['email'])) {
    // If session is not set, redirect to login page
    header("Location: index.php");
    exit();
}

$email = $_SESSION['email']; // Get the user's email from session

// Check if the user has been inactive for more than the defined timeout period
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $inactive_timeout) {
    // User has been inactive for more than 60 seconds, so log them out
    // Record the logout time in the database first
    date_default_timezone_set('Asia/Kolkata');
    $logout_time = date('Y-m-d H:i:s'); // Current timestamp
    

    // Query to update logout time in the login_history table
    $sql = "UPDATE login_history 
            SET logout_time = '$logout_time' 
            WHERE email = '$email' AND logout_time IS NULL 
            ORDER BY login_time DESC 
            LIMIT 1";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        echo "Logout time recorded due to inactivity.";
    } else {
        echo "Error recording logout time: " . mysqli_error($con);
    }

    // Destroy the session to log the user out
    session_unset();
    session_destroy();
    header("Location: index.php"); // Redirect to login page
    exit();
}

// If the user is still active, update the last activity timestamp
$_SESSION['last_activity'] = time(); // Update last activity time to the current time

// Continue with logout process
date_default_timezone_set('Asia/Kolkata');
$logout_time = date('Y-m-d H:i:s'); // Current timestamp
$ip_address = $_SERVER['REMOTE_ADDR']; // Get the user's IP address

// Query to update logout time for the user
$sql = "UPDATE login_history 
        SET logout_time = '$logout_time', ip_address = '$ip_address' 
        WHERE email = '$email' AND logout_time IS NULL 
        ORDER BY login_time DESC 
        LIMIT 1";

// Execute the query to update the logout time
if (mysqli_query($con, $sql)) {
    // If the logout time was updated successfully
    echo "Logout time recorded successfully!";
} else {
    // If there was an error executing the query
    echo "Error recording logout time: " . mysqli_error($con);
}

// Destroy the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to the login page (index.php)
header("Location: index.php");
exit;
?>
