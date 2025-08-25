
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

          <div class="col-lg-4 border border-4 " style="background-color:#80bfff;">
            <div class="col">
            <div class="styled-heading">
            <h3 class="text-dark p-3 text-center">PROFILE</h3>
            </div>
          
            </div>
            
            <div class="col">
    <div class="card" style="width:21rem; margin-left:20px;">
        <div class="row g-0">
            <div class="col-md-4 mt-3">
                <!-- Check if 'pic' is empty, if so, use a default image -->
                <img src="<?php echo !empty($result['pic']) ? $result['pic'] : 'uploads\dp\images (1).png'; ?>" 
                     class="img-fluid p-1" alt="image" 
                     style="margin-top:-15px; height:150px; object-fit:fill;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text"><?php echo $result['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div><!-- card closed-->

 
            <br><br>
            <div class="col d-flex ">
              <button class="btn"><a href="change-form.php">Change Password</a></button>&nbsp;&nbsp;&nbsp;
              <button class="btn"><a href="uploadpicphp.php">Upload Profile Picture</a></button>
              
            </div><br>
           
            </div>
          </div>
          
            <div class="col-lg-8 bg-primary">
              <h2 class="text-center pt-5">Log In History</h2>
              <div class="container">
            <div class="row pt-5">
            <table class="table table-bordered table-hover  ">
              <tr>
                <th>Eamil</th>
                <th>IP Address</th>
                <th>Login Time</th>
                <th>LogOut Time</th>
              </tr>
              <?php
              $rec=mysqli_query($con,"select * from login_history where email='$email' order by login_time desc limit 7");
              while($result=mysqli_fetch_assoc($rec))
              {
                ?>
                <tr>
                  <td><?php echo $result['email'];?></td>
                  <td><?php echo $result['ip_address'];?></td>
                  <td><?php echo $result['login_time'];?></td>
                  <td><?php echo $result['logout_time'];?></td>
                </tr>
              <?php  
              }
              ?>

            </table>
             
   
   <div class="col-lg-3"></div>
   <div class="col-lg-6  text-dark" style="height:400px;" >
       
                           </div><br>
                           
                           
       </form>
   </div>
   <div class="col-lg-3"></div>
   
   </div>
       
                        </div>
               
                
                </div><!---row closed-->
                </div>
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