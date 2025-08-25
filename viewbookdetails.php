<?php
$bid=$_REQUEST['bid'];
include "db.php";
$q=mysqli_query($con, "select * from books where book_id='$bid' ");
$details=mysqli_fetch_assoc($q);
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
        <h1 class="text-dark text-center mt-4 " style="font-family:sans-serif;">Book Details</h1><br>

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <img src="<?php echo $details['cover_page']; ?>" class=" pic1 img-fluid img-thumbanil" style="height:300px">
                </div>

                <div class="col-lg-9">
                    <div class="info p-3" style="border-bottom:1px dotted black;">
                    <h3 >
                        <?php echo $details['book_title'] ?>
                    </h3>
                   
                    <h6> <b>By :</b>  <a href="author.php?author=<?php echo $details['author_name'] ?>" style="color:#31A88E;">
                            <?php echo $details['author_name'] ?>
                        </a> </h6></div>
                        <div class="info p-3" style="border-bottom:1px dotted black;">
                        <b>Genre: </b>
                    <?php echo $details['category'] ?><br>
                    <b>Type: </b>
                    <?php echo $details['format'] ?><br>
                    <b>Language:</b>
                    <?php echo $details['language']?><br>
                    <b>Price : </b>₹
                    <?php echo $details['price']?><br>
                    </div>
                </div>

    </div><br><br>
    <div class="styled-heading">
                <h3 class=" text text-center">Description</h3>
                </div>
                <?php echo $details['book_description']?>
                <div class="styled-heading"><br><br>
                <h3 class=" text text-center">About the Author</h3>
    </div>
                
                <?php echo $details['author_bio']?>
                <div class="styled-heading"><br><br>
                <h3 class=" text text-center">Book Details</h3>
                </div>
                <b>ISBN :</b> <?php echo $details['isbn']?><br>
               <b>Pages :</b> <?php echo $details['number_of_pages']?><br>
                <b>Price : </b><?php echo $details['price']?><br>
                <b>Format : </b><?php echo $details['format']?><br><br>
                <div class="styled-heading">
                <h3 class=" text text-center">Rating and review</h3>
                </div>
                <div class="row">
                <div class="col-lg-6 text-center">
                    <img src="<?php echo $details['cover_page']; ?>" class="img-fluid img-thumbanil" style="height:250px"><br><br>
                  <b>  <?php echo $details['book_title']?></b><br>
                  <div class="icon" style="color:#E2E8E6;">
                  <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                  </div>
                </div>
                <div class="col-lg-6" style="border-bottom:1px solid black;">
                    <img src="images/reviews-absent.67ab2bcd74f9.png" alt="" class="img img-fluid">
                </div>
                
                </div>
               
                <br><br>
            
            

        </div>
        </div>
        

    </div>
    

    <!--// SLIDER -->

    <!---footer---->
    <?php include "footer.php";?>
    <!---footer end---->
</body>

</html>