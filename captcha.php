<?php
session_start();
include "db.php";

// Generate a random 6-character CAPTCHA string
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$captcha_code = substr(str_shuffle($characters), 0, 6);
$_SESSION['captcha_code'] = $captcha_code; // Store it in session

// Create a blank image
$image = imagecreatetruecolor(120, 40);
$bg_color = imagecolorallocate($image, 255, 255, 255); // White background
$text_color = imagecolorallocate($image, 0, 0, 0); // Black text

// Fill the background
imagefill($image, 0, 0, $bg_color);

// Add the CAPTCHA code to the image
imagestring($image, 5, 40, 10, $captcha_code, $text_color);

// Output the image to the browser
header('Content-Type: image/png');
imagepng($image);

// Clean up the memory
imagedestroy($image);
?>
