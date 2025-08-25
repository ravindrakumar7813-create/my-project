<?php
session_start();
// Include your database connection
include "db.php"; 

// Check if the form is submitted
if (isset($_POST['submit'])) 
{
    // Get data from the form
    $book_title = mysqli_real_escape_string($con, $_POST['book_title']);
    $author_name = mysqli_real_escape_string($con, $_POST['author_name']);
    $category_id = $_POST['category']; // Category ID selected from dropdown
    $isbn = mysqli_real_escape_string($con, $_POST['isbn']);
    $book_description = mysqli_real_escape_string($con, $_POST['book_description']);
    $publication_date = $_POST['publication_date'];
    $language = mysqli_real_escape_string($con, $_POST['language']);
    $number_of_pages = $_POST['number_of_pages'];
    $format = $_POST['format'];
    $price = $_POST['price'];
    $keywords_tags = mysqli_real_escape_string($con, $_POST['keywords_tags']);
    $author_bio = mysqli_real_escape_string($con, $_POST['author_bio']);

    // Get book_id (for updating the book)
    $bid = $_REQUEST['bid']; // or use $_POST['book_id'] if sent in POST

    // SQL query to update the book details
    $query = "UPDATE books SET 
                book_title='$book_title', 
                author_name='$author_name', 
                category='$category_id', 
                isbn='$isbn', 
                book_description='$book_description', 
                publication_date='$publication_date', 
                language='$language', 
                number_of_pages='$number_of_pages', 
                format='$format', 
                price='$price', 
                keywords_tags='$keywords_tags', 
                author_bio='$author_bio' 
              WHERE book_id='$bid'";

    // Execute the query and check for success
    if (mysqli_query($con, $query)) {
        echo "Book updated successfully!";
        header("location:list-book.php");
    } else {
        error_log("MySQL Error: " . mysqli_error($con)); // Log error for debugging
        echo "There was an issue updating the book.";
    }
}
?>
