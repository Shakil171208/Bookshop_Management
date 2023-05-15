<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "books";

$conn = new mysqli($servername, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$bookName = $_POST['book_name'];
$publisherName = $_POST['publisher_name'];
$publisherAge = $_POST['publisher_age'];
$pageNo = $_POST['page_no'];
$publishDate = $_POST['publish_date'];
$bookType = $_POST['book_type'];

// Prepare the SQL statement
$sql = "INSERT INTO book_list (book_name, publisher_name, publisher_age, page_no, publish_date, book_type)
        VALUES ('$bookName', '$publisherName', $publisherAge, $pageNo, '$publishDate', '$bookType')";

// Execute the SQL statement and check for errors
if ($conn->query($sql) === TRUE) {
    // Close the database connection
    $conn->close();

    // Redirect to search_book.php
    header("Location: search_book.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
