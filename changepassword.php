<?php
session_start();

// Include database connection
include "db.php";

// Check if the user is logged in
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    die("User not logged in.");
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $new_password = md5($_POST['new_password']);
    $current_password = md5($_POST['current_password']);
    $confirm_password = md5($_POST['confirm_password']);

    // Check if new password and confirm password match
    if ($new_password != $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }

    // Validate the current password
    $q = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND pass='$current_password'");
    
    if (mysqli_num_rows($q) > 0) {
        // Update the password
        $update = mysqli_query($con, "UPDATE users SET pass='$new_password' WHERE email='$email'");
        if ($update) {
            echo "Password updated successfully.";
            header('location:myprofile.php');
        } else {
            echo "Error updating password.";
        }
    } else {
        echo "Incorrect current password.";
    }
}
?>
