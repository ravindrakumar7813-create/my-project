<?php
 include "db.php";
    // Get the user input and sanitize it
    $search= $_REQUEST['txt'];
   

    // SQL query with sanitized user input
    $rec = mysqli_query($con,"SELECT * FROM books WHERE category like '%$search%' OR author_name like '%$search%' OR book_title like '%$search%'");
    
?>
    
    
           
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Page Title -->
    <title>Book Details </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .nav ul li {
            list-style-type: none;
            margin-right: 200px;
            padding: 10px;
        }

        .nav a {
            text-decoration: none;
            color: black;
        }

        .list li {
            list-style-type: none;
            margin-right: 200px;
            padding: 10px;
        }

        .list a {
            text-decoration: none;
            color: black;
        }

        .pic1:hover
        {
            transition:3s;
            padding:20px;
        }
    </style>
</head>

<body>

    <!---navbar---->
    <?php include "navbar.php";?>
    <!---navbar closed---->
    <!-- SLIDER -->
    <section style="background-image:url('images/slider.jpg'); background-size:cover; height:127px;">


    </section><br><br>

    <div class="container">
        <h3 class="text-dark text-center mt-4" style="font-family:arial">Browse All Books</h3>
    <div class="row ">
                <form action="search.php" method="post" class="d-flex">
                    <input type="search" placeholder="search book name or author name" class="form-control bg-light" style="width:950px;" name="txt" >
                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-magnifying-glass  text-white"></i></button>
                    
                </form>
    
</div>
    </div>


    <br><br>
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-3 bg-light p-3">
            <button class="btn p-3 ml-5 "style="width:80%;font-size:20px;"><i class="fa-solid fa-house-chimney text-danger"></i>Store Home</button><br><br>
            <div class="styled-heading">
            <h3 > CATEGORIES</h3>
            </div>
            <ul class="list">
            <?php
                // Fetch categories from the database
                include "db.php"; // Database connection file

                $result = mysqli_query($con, "SELECT category FROM categories limit 15");

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li><a href='#'>" . $row['category'] . "</a></li>";
                }
                ?>
                
            </ul>
            
        </div>
        
        <div class="col-lg-9">
       
                    
<div class="container">
    <div class="row">
                    
    <?php

    if (mysqli_num_rows($rec) > 0) {
        // Loop through the result set and display each book
        while ($row = mysqli_fetch_assoc($rec)) {
?>
  <div class="col-lg-4 col-md-6 col-sm-12 mb-4"> <!-- Adjust column sizes -->
                <div class="card" style="width: 100%;height:700px;"> <!-- Ensure the card takes the full width of the column -->
                    <img class="card-img-top" style="height:500px;" src="<?php echo $row['cover_page']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $row['book_title']; ?></h6>
                        <p class="card-text"><?php echo $row['author_name']; ?>.</p>
                        <div class="featured-btn-wrap">
                        <a href="viewbookdetails.php?bid=<?php echo $row['book_id']; ?>" class="btn btn-danger">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        // Display a message if no results were found
        echo "<p>No books found matching your search criteria.</p>";
    }

?>
    </div></div></div></div>

    <!--// SLIDER -->

    <!---footer---->
    <?php include "footer.php";?>
    <!---footer end---->
</body>

</html>
