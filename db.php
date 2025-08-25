<?php
$con = mysqli_connect("localhost", "root", "", "booklisting");
//$con = mysqli_connect("localhost", "jaisanrelo_ravindra", "P@ssw0rd123", "jaisanrelo_booklisting");

if (!$con) {
    echo "error occured" . mysqli_connect_error();
}
