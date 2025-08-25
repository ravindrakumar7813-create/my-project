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
    <title>Listing &amp; Directory Website Template</title>
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
    <style>
        .img1{
            background-image:url('images/slider.jpg');
        }
    </style>
</head>
<body>

    <?php include "navbar.php";?>

    <section style="background-image:url('images/slider.jpg');background-size:cover;min-height:500px; padding:250px ">
<div class="row">
   
<div class="col-lg-3"></div>
<div class="col-lg-6 bg-white text-dark" style="height:400px;" >
    <h3 class="text-center p-3">Forget password  </h3>
    <form action="forgetpassword.php" method="post">
        <label for="email" > <b>  Email:</b></label>
       <input type="text" class="form-control" name="email" required>
      <br><br>
       <div class="featured-btn-wrap">
                            <button type="submit" class="btn btn-danger">Forget password</button>
                        </div><br>
                        
                        
    </form>
</div>
<div class="col-lg-3"></div>

</div>
</div>
    </section>
    <?php include "footer.php";?>
    

</body>


</html>