<?php
$title = $_REQUEST['title'];

include "db.php";

$q = mysqli_query($con, "select * from books where book_title like '%$title%' or author_name like '%$title%' or price like '%$title%'");
while ($rec = mysqli_fetch_assoc($q)) {
?>

    <div style=" padding:20px 15px; border:solid 10px green; width:400px;">
        <img src="<?php echo $rec['cover_page']; ?>">
        <h2><?php echo $rec['book_title']; ?></h2>
        <p> By : <?php echo $rec['author_name']; ?> In just Rs. <?php echo $rec['price']; ?>
    </div><br>

<?php
}


?>