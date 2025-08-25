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
        /* Ensure CAPTCHA image and label are on the same line */
        .captcha-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .captcha-container img {
            border: 2px solid #ddd;
            padding: 5px;
            width: auto;
            height: 60px; /* Adjust height of the CAPTCHA image */
        }

        .captcha-container label {
            margin-left: 10px;
            font-weight: bold;
        }

        /* Style for the captcha input */
        .captcha-container input {
            width: 100%;
            padding: 5px;
            margin-top: 0;
        }
    </style>
</head>

<body>

    <?php include "navbar.php"; ?>

    <section style="background-image:url('images/slider.jpg');background-size:cover;height:800px; padding:200px;">
        <div class="row m-0 justify-content-center">
            <!-- Centering form container -->
            <div class="col-lg-4 col-md-6 bg-white text-dark p-4" style="border-radius:30px; height: auto;">
                <h3 class="text-center text-primary">Login</h3>
                <hr>
                <form action="logindata.php" method="post">
                    <div class="form-group">
                        <label for="email"><b>Email:</b></label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pass"><b>Password:</b></label>
                        <input type="password" class="form-control" name="pass" required>
                    </div><br>
                    
                    <!-- Remember me checkbox -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div>

                    <!-- CAPTCHA Section with Image and Input -->
                    <div class="captcha-container">
                        <img src="captcha.php" alt="CAPTCHA Image">
                        
                    </div>
                    <label for="captcha" class="mb-0">Enter CAPTCHA:</label>
                    <input type="text" name="captcha" id="captcha" required><br>

                    <br>
                    <div class="featured-btn-wrap">
                        <button type="submit" class="btn btn-danger w-100 fw-bold" style="border-radius: 25px;">Login</button>
                    </div>
                    
                    <div class="mt-3 text-left ">
                        <a href="forgetform.php" >Forget password?</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>

</body>

</html>
