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
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
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
        .img1 {
            background-image: url('images/slider.jpg');
        }
    </style>
</head>
<body>

    <?php include "navbar.php";?>

    <section style="background-image:url('images/slider.jpg'); background-size:cover; min-height:500px; padding:200px;">
        <div class="row m-0 justify-content-center">
            <!-- Centering the form -->
            <div class="col-lg-4 col-md-6 bg-white text-dark p-4" style="border-radius:30px; height: auto;">
                <h3 class="text-center text-primary">Sign Up</h3>
                <hr>
                <form action="signupdata.php" method="post">
                    <div class="form-group">
                        <label for="email"><b>Email:</b></label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pass"><b>Password:</b></label>
                        <input type="password" class="form-control" name="pass" required>
                    </div>

                    <!-- Submit button -->
                    <div class="featured-btn-wrap">
                        <button type="submit" class="btn btn-danger mt-3" style="border-radius: 25px;">Create New Account</button>
                    </div>

                    <!-- Already have an account? link -->
                    <div class="mt-3 text-left">
                        <p><a href="login.php">Already have an account?</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include "footer.php";?>

</body>
</html>
