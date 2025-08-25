
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
                          $q=mysqli_query($con, "select * from books where email='$email'");
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
    <title>Cover page &amp; Directory Website Template</title>
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
    
    
            <br><br>
            
                        </div>
          </div>
          
            <div class="col-lg-9 bg-light">
            <div class="row">
             
   
   
     <form action="" method="post" enctype="multipart/form-data">
     <input type="hidden" name="bid" value="<?php echo $_REQUEST['bid']; ?>" >

                          <input type="file" name="f1" accept="image/*">

                          <button name="btn">Upload </button>
                        </form>



                        <?php
                      
if(isset($_REQUEST['btn']))
{
  $bid=$_REQUEST['bid'];
    $name=$_FILES['f1']['name'];
    
 
 $fname=$_FILES['f1']['tmp_name'];
 $size=$_FILES['f1']['size'];
 if($size>500000)
 {
    echo "file is too large.. max size is 0.5 mb";
    exit;
 }
 $path="uploads/";
 $fpath=$path.basename($name);

 if(move_uploaded_file($fname,$fpath))
 {
    echo "File Uploaded successfully";
    include "db.php";
    mysqli_query($con, "update books set cover_page='$fpath' where book_id ='$bid' ");
 }
else
{
    echo "There is some error in uploading";
}

}


?>

    
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