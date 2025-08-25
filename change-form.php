
<?php
session_start();

                          include "db.php";
                          
                          if(isset($_SESSION['email']))
                          {
                            $email=$_SESSION['email'];
                          }
                          else{
                            echo "user name is note set";
                          }
                          $q=mysqli_query($con, "select * from users where email='$email'");
                          $result=mysqli_fetch_assoc($q);
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
</head>

<body>
   <?php include "navbar1.php"; ?>
   <section style="background-image:url('images/slider.jpg'); background-size:cover; height:127px;">
   </section>
    
    <div class="container-fluid">
        <div class="row">

          <div class="col-lg-3 bg-light border border-4 ">
            <div class="col">
            <div class="styled-heading">
            <h3 class="text-dark p-3 text-center">PROFILE</h3>
            </div>
          
            </div>
            <div class="col">
            <div class="card ">
                    <div class="row g-0">
                      <div class="col-md-4  ">
                        <img src="<?php echo $result['pic']; ?>" class="img-fluid ml-3" alt="image" style="height:120px; width:180px;object-fit:contain;" >
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <p class="card-text"> <?php echo $result['email'];?></p>
                          
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
               
            </div><!--card closed-->
            <br><br>
            <div class="col d-flex ">
              <button class="btn"><a href="signup.php">Change Password</a></button>&nbsp;&nbsp;&nbsp;
              <button class="btn"><a href="uploadpicphp.php">Upload Profile Picture</a></button>
              
            </div><br>
                        </div>
          </div>
          
            <div class="col-lg-9 bg-light">
            <div class="row">
             
   
   <div class="col-lg-3"></div>
   <div class="col-lg-6  text-dark" style="height:400px;" >
       <h3 class="text-center p-3">Change password  </h3>
       <form action="changepassword.php" method="post">
           <label for="password" > <b> current password:</b></label>
          <input type="password" class="form-control" name="current_password" required>

          <label for="password" > <b> new password:</b></label>
          <input type="password" class="form-control" name="new_password" required>

          <label for="password" > <b> confirm password:</b></label>
          <input type="password" class="form-control" name="confirm_password" required>
         <br><br>
          <div class="featured-btn-wrap">
                               <button type="submit" class="btn btn-danger" name="submit">Change password</button>
                           </div><br>
                           
                           
       </form>
   </div>
   <div class="col-lg-3"></div>
   
   </div>
       
                        </div>
               
                
                </div><!---row closed-->
              </div><!---container closed--->
                
            
<?php include "footer.php";
?>
    
    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(window).scroll(function () {
            // 100 = The point you would like to fade the nav in.

            if ($(window).scrollTop() > 100) {

                $('.fixed').addClass('is-sticky');

            } else {

                $('.fixed').removeClass('is-sticky');

            };
        });
    </script>

</body>
</html>