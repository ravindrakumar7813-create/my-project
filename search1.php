<div class="row">
<?php
 include "db.php";
    // Get the user input and sanitize it
    $search= $_REQUEST['title'];
   

    // SQL query with sanitized user input
    $rec = mysqli_query($con,"SELECT * FROM books WHERE category like '%$search%' OR author_name like '%$search%' OR book_title like '%$search%' or price like '%$search%'");
    

    if (mysqli_num_rows($rec) > 0) {
        // Loop through the result set and display each book
        while ($row = mysqli_fetch_assoc($rec)) {
            ?>
  
  
  <div class="col-lg-4"> <!-- Adjust column sizes -->
                <div class="card" style="height:700px;"> <!-- Ensure the card takes the full width of the column -->
                    <img class="card-img-top" style="height:500px;" src="<?php echo $row['cover_page']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $row['book_title']; ?></h6>
                        <p class="card-text"><?php echo $row['author_name']; ?></p>
                        </div>
                        <div class="featured-btn-wrap">
                        <a href="viewbookdetails.php?bid=<?php echo $row['book_id']; ?>" class="btn btn-danger">Buy Now</a>
                        </div>
                        
        </div>
        </div>
            
                
    <?php
        }
    } else {
        // Display a message if no results were found
        echo "<p>No books found matching your search criteria.</p>";
    }

?>

