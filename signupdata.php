<?php
include "db.php"; 

$email = $_REQUEST['email'];
$pass = md5($_REQUEST['pass']);
//$activationkey = mt_rand() . mt_rand();

// Check if email already exists
$result = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($result) > 0) {
    echo " <h2 style='color:red;'>Email ID already exists!!!</h2>";
} else {
    // Insert new user with activation key
    $q = mysqli_query($con, "INSERT INTO users (email, pass) 
                             VALUES ('$email', '$pass')");
                            // include "notification.php";
   // if($q) {
      //  echo "An email has been sent to $_REQUEST[email] with an activation key. Please check your mail to complete registration.";

        // Send activation email
       // $to = $_REQUEST['email'];
        //$subject = "new Registration";
       // $message = "Welcome to our website!\r\rYou, or someone using your email address, has completed registration at websjyoti.com. You can complete registration by clicking the following link:\rhttp://www.websjyoti.com/verify.php?activationkey=$activationkey\r\r\r\rRegards,\nWebs Jyoti Team";

        //$headers = 'From: demo@jaisanrelo.com' . "\r\n" .
                  // 'Reply-To: demo@jaisanrelo.com' . "\r\n" .
                  // 'X-Mailer: PHP/' . phpversion();

        //mail($to, $subject, $message, $headers);
    //} else {
      //  echo "Error: " . mysqli_error($con);
      header("location:login.php");
    }
//}

// Activation and status update
// if(isset($_REQUEST['activationkey'])) {
//     $activationkey = $_REQUEST['activationkey'];
//     $query = "SELECT * FROM users WHERE activationkey = '$activationkey' AND status = 'verify'";
//     $result = mysqli_query($con, $query);

//     if(mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);
//         echo "Congratulations! " . $row["email"] . " is now the proud new owner of a websjyoti.com account.";

//         // Update user status to activated
//         $updateQuery = "UPDATE users SET activationkey = '', status = 'activated' WHERE id = " . $row['id'];
//         if(mysqli_query($con, $updateQuery)) {
//             echo "<br>Account activated successfully!";
//             header("Location: login.php");
//         } else {
//             echo "<br>Error activating account: " . mysqli_error($con);
//         }
//     } else {
//         echo "<h2 style='color:red;'>Invalid activation key or account already activated!</h2>";
//     }
// }
?>
