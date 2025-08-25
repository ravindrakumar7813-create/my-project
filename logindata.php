<?php
session_start(); // Start the session
include "db.php"; // Include the database connection

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the submitted email and password from the form
    $email = mysqli_real_escape_string($con, $_REQUEST['email']);
    $pass = md5($_REQUEST['pass']);

    $captcha = $_POST['captcha'];

    if ($captcha != $_SESSION['captcha_code']) {
        echo "Incorrect CAPTCHA. Please try again.";
        exit();
    } else {

    // Query the database for the user's email and password
    $q = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND pass='$pass'");

    // Check if any rows were returned
    if (mysqli_num_rows($q) > 0) {
        // Set the email in the session
        $_SESSION['email'] = $email;

        // Log the login time and IP address
        date_default_timezone_set('Asia/Kolkata'); // Correct timezone string
        $login_time = date('Y-m-d H:i:s');
        $ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address

        // Insert login details into the login_history table
        $sql = mysqli_query($con, "INSERT INTO login_history(email, login_time, ip_address) VALUES ('$email', '$login_time', '$ip_address')");
        if (!$sql) {
            echo "Error inserting login history: " . mysqli_error($con);
        }

        // Redirect to the welcome page
        header('Location: welcome.php');
        exit(); // Ensure the script stops after redirecting
    } else {
        // Invalid credentials, show an error message
        $error = "Invalid credentials. Please try again.";
        echo $error; // For demonstration purposes; you might want to handle this differently
    }
}
}
?>
