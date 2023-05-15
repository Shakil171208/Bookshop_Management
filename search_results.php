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

// Retrieve search criteria from AJAX request
$keyword = $_POST['keyword'];
$age = $_POST['age'];
$bookType = $_POST['book_type'];

// Prepare the SQL statement based on the search criteria
$sql = "SELECT * FROM book_list WHERE 1=1";

if (!empty($keyword)) {
    $sql .= " AND (book_name LIKE '%$keyword%' OR publisher_name LIKE '%$keyword%')";
}

if (!empty($age)) {
    $sql .= " AND publisher_age = $age";
}

if (!empty($bookType)) {
    $sql .= " AND book_type = '$bookType'";
}

// Execute the SQL statement and fetch the results
$result = $conn->query($sql);

// Display the search results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>Book Name: " . $row['book_name'] . "</p>";
        echo "<p>Publisher Name: " . $row['publisher_name'] . "</p>";
        echo "<p>Publisher Age: " . $row['publisher_age'] . "</p>";
        echo "<p>Page No: " . $row['page_no'] . "</p>";
        echo "<p>Publish Date: " . $row['publish_date'] . "</p>";
        echo "<p>Book Type: " . $row['book_type'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "No books found.";
}

// Close the database connection
$conn->close();
?>
