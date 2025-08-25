<?php
include "db.php"; // Database connection

// Check if the necessary POST data exists
if (isset($_POST['book_id']) && isset($_POST['field']) && isset($_POST['value'])) {
    $bookId = $_POST['book_id'];
    $field = $_POST['field'];
    $value = mysqli_real_escape_string($con, $_POST['value']); // Sanitize input

    // Update the specific field in the database
    $query = "UPDATE books SET $field = '$value' WHERE book_id = $bookId";

    if (mysqli_query($con, $query)) {
        echo "Updated successfully!";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
} else {
    echo "Required data not sent.";
}
?>
