<!DOCTYPE html>
<html>
<head>
    <title>Search Books</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#search-form").submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            
            $.ajax({
                type: "POST",
                url: "search_results.php",
                data: formData,
                success: function(response) {
                    $("#book-list").html(response);
                }
            });
        });
    });
</script>

</head>
<body>
    <h1>Search Books</h1>

    <form id="search-form" action="search_results.php" method="POST">
        <label for="keyword">Keyword:</label>
        <input type="text" name="keyword" id="keyword"><br><br>

        <label for="age">Age:</label>
        <input type="number" name="age" id="age"><br><br>

        <label for="book_type">Book Type:</label>
        <select name="book_type" id="book_type">
            <option value="">-- Select Type --</option>
            <option value="sci-fi">Sci-fi</option>
            <option value="drama">Drama</option>
            <option value="novel">Novel</option>
        </select><br><br>

        <input type="submit" value="Search">
    </form>

    <h2>Book List</h2>
    <div id="book-list">
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

        // Retrieve the entire book list
        $sql = "SELECT * FROM book_list";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Book Name</th><th>Publisher Name</th><th>Publisher Age</th><th>Page No</th><th>Publish Date</th><th>Book Type</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['book_name'] . "</td>";
                echo "<td>" . $row['publisher_name'] . "</td>";
                echo "<td>" . $row['publisher_age'] . "</td>";
                echo "<td>" . $row['page_no'] . "</td>";
                echo "<td>" . $row['publish_date'] . "</td>";
                echo "<td>" . $row['book_type'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No books found.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
