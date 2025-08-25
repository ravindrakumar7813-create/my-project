<?php
$bookid=$_REQUEST['bid'];

include "db.php";

$q=mysqli_query($con, "delete from books where book_id='$bookid' ");

?>
<script>
    confirm("Book deleted");
   
    self.location='list-book.php';
    </script>