<?php
session_start();
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
        <div class="col-lg-12 col-md-6 col-sm-12 " style="background-color:#e9f0f5;">
            <h3 class="text-center p-4">My Print Books</h3>

        </div>
    </div>

</div><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-12 ">
        <div class="featured-btn-wrap text-center mb-5">
                        <a href="add-book.php" class="btn btn-danger">New Projects</a>
                        </div>

                        
                        <table class="table table-striped table-bordered border border-3">
    <tr>
        <th>ISBN</th>
        <th>Book Title</th>
        <th>Author Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Print Ready File</th>
        <th>Action</th>
       </tr>
    <?php
    include "db.php";
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        echo "Email is not set in session.";
        exit;
    }

    // Query to fetch data based on the email stored in the session
    $email = $_SESSION['email'];
    $q = mysqli_query($con, "SELECT * FROM books WHERE email='$email'");

    // Loop to fetch and display data
    while ($result = mysqli_fetch_assoc($q)) {
    ?>
        <tr>
            <td class="editable" data-field="isbn" data-id="<?php echo $result['book_id']; ?>"><?php echo $result['isbn']; ?></td>
            <td class="editable" data-field="book_title" data-id="<?php echo $result['book_id']; ?>"><?php echo $result['book_title']; ?></td>
            <td class="editable" data-field="author_name" data-id="<?php echo $result['book_id']; ?>"><?php echo $result['author_name']; ?></td>
            <td class="editable" data-field="category" data-id="<?php echo $result['book_id']; ?>"><?php echo $result['category']; ?></td>
            <td class="editable" data-field="price" data-id="<?php echo $result['book_id']; ?>"><?php echo $result['price']; ?></td>
            <td align="center">
                <img src="<?php echo $result['cover_page']; ?>" height="40" width="30" class="img-fluid">
            </td>
            <td>
                <a href="edit-book.php?bid=<?php echo $result['book_id']; ?>" class="btn btn-primary mr-2">Edit</a>&nbsp;
                <a href="delete-book.php?bid=<?php echo $result['book_id']; ?>" class="btn btn-danger">Delete</a>&nbsp;
                <a href="update_cover page.php?bid=<?php echo $result['book_id']; ?>" class="btn btn-success mr-2">Update pic</a>
            </td>
        </tr>
    <?php } ?>
</table>

<!-- JavaScript for Inline Editing and AJAX -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // Make table cells editable
        $('.editable').click(function () {
            var currentText = $(this).text();
            var field = $(this).data('field');
            var bookId = $(this).data('id');
            var inputField = $('<input>', {
                value: currentText,
                type: 'text',
                class: 'form-control',
                'data-field': field,
                'data-id': bookId
            });

            $(this).html(inputField);
            inputField.focus();

            // When input loses focus, save the changes
            inputField.blur(function () {
                var updatedValue = $(this).val();
                updateField(bookId, field, updatedValue);
            });

            // When the user presses Enter, save the changes
            inputField.keyup(function (e) {
                if (e.key === 'Enter') {
                    var updatedValue = $(this).val();
                    updateField(bookId, field, updatedValue);
                }
            });
        });
    });

    // Function to send updated value via AJAX
    function updateField(bookId, field, updatedValue) {
        $.ajax({
            url: 'update_book1.php', // PHP script to update book data
            type: 'POST',
            data: {
                book_id: bookId,
                field: field,
                value: updatedValue
            },
            success: function (response) {
                // Update the table cell with the new value
                $('td[data-id="' + bookId + '"][data-field="' + field + '"]').html(updatedValue);
            },
            error: function () {
                alert('Error updating the record.');
            }
        });
    }

    // Function to save changes (you can use the button below or auto-save on blur)
    function saveChanges(bookId) {
        var updatedData = {};

        $('td[data-id="' + bookId + '"]').each(function () {
            var field = $(this).data('field');
            var updatedValue = $(this).text();
            updatedData[field] = updatedValue;
        });

        $.ajax({
            url: 'save_book_changes.php',
            type: 'POST',
            data: { book_id: bookId, updated_data: updatedData },
            success: function (response) {
                alert('Changes saved successfully!');
            },
            error: function () {
             //   alert('Error saving changes.');
            }
        });
    }
</script>


        </div>
    </div>

</div><br><br>


    <?php include "footer.php"; ?>


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