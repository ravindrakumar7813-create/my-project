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

    // Handle cover page image upload
    if (isset($_FILES['cover_page'])) 
    {
        $cover_page_name = $_FILES['cover_page']['name'];
        $cover_page_tmp = $_FILES['cover_page']['tmp_name'];
        $cover_page_path = 'uploads/' . $cover_page_name;
        
        // Move the uploaded file to the 'uploads' folder
        if (move_uploaded_file($cover_page_tmp, $cover_page_path)) {
            // File uploaded successfully
        } else {
            echo "Failed to upload cover image.";
            exit;
        }
    }

    // Insert book details into the database
    $query = "INSERT INTO books (book_title,email, author_name, category, isbn, book_description, publication_date, language, number_of_pages, cover_page, format, price, keywords_tags, author_bio) 
              VALUES ('$book_title', '$_SESSION[email]' ,'$author_name', '$category_id', '$isbn', '$book_description', '$publication_date', '$language', '$number_of_pages', '$cover_page_path', '$format', '$price', '$keywords_tags', '$author_bio')";

    if (mysqli_query($con, $query)) {
        echo "Book successfully submitted!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
