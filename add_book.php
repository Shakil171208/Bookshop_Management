<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h1>Add a Book</h1>

    <form action="save_book.php" method="post">
        <label for="book_name">Book Name:</label>
        <input type="text" name="book_name" id="book_name" required><br><br>

        <label for="publisher_name">Publisher Name:</label>
        <input type="text" name="publisher_name" id="publisher_name" required><br><br>

        <label for="publisher_age">Publisher Age:</label>
        <input type="number" name="publisher_age" id="publisher_age" required><br><br>

        <label for="page_no">Page No:</label>
        <input type="number" name="page_no" id="page_no" required><br><br>

        <label for="publish_date">Publish Date:</label>
        <input type="date" name="publish_date" id="publish_date" required><br><br>

        <label for="book_type">Book Type:</label>
        <select name="book_type" id="book_type">
            <option value="sci-fi">Sci-fi</option>
            <option value="drama">Drama</option>
            <option value="novel">Novel</option>
        </select><br><br>

        <input type="submit" value="Save">
    </form>
</body>
</html>
