<?php 
include "db.php";
$email=$_REQUEST['email'];
$q=mysqli_fetch_assoc(mysqli_query($con,"select * from users where email='$email'"));
$pass=$q['pass'];
$sub="Your password login details";
$msg="hello $email, you recently request for password please find your password  below \n password $pass \n\n<font color='green'>regards booklisting.com</font>";
$headers="from: booklisting support @booklisting.com\n";
mail($email,$sub,$msg,$headers);
echo "<h3>your password sent successfully on your email</h3>";
?>