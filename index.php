<!DOCTYPE html>
<html>
<head>
    <title>Book Management System</title>
</head>
<body>
    <h1>Welcome to the Book Management System</h1>

    <a href="add_book.php">Add a Book</a><br>
    <a href="search_book.php">Search Books</a>

    <?php
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo "<p>$message</p>";
    }
    ?>
</body>
</html>
