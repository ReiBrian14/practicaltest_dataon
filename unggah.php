<!DOCTYPE html>
<html>
<head>
  <title>Coffee Valley</title>
  <link rel="stylesheet" href="tambah_penyalur_style.css">
</head>
<body>

<header>
  <img src="asset\image\already_removebg.png" alt="Coffee Valley Logo" class="logo">
  <h1>Coffee Valley</h1>
  <p>Taste the love in every cup!</p>
  <p>One Alewife Center 3rd Floor</p>
  <p>Cambridge, MA 02140</p>
</header>

<nav>
  <ul>
    <li><a href="home.php">Home</a></li>
    <li><a href="catalog.php">Catalog</a></li>
    <li><a href="#">Order Status</a></li>
    <li><a href="penyalur.php">Distributors</a></li>
    <li><a href="#">Upload</a></li>
    <li><a href="#">Logout</a></li>
  </ul>
</nav>

<main>
<h1>Upload Dokumen</h1>

<form method="post" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>

    <label for="document_file">Document File:</label>
    <input type="file" name="document_file" id="document_file" required>

    <label for="author">Author:</label>
    <input type="text" name="author" id="author" required>

    <input type="submit" value="Add Document">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffe_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $document_file = $_FILES["document_file"]["name"];
    $author = $_POST["author"];

    // Create uploads directory if it doesn't exist
    $uploads_dir = 'C:\\xampp\\htdocs\\practical_test\\FILE ENTER UPLOAD OK';
    if (!file_exists($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
    }

    $target_file = $uploads_dir. '\\'. basename($_FILES["document_file"]["name"]);

    if (move_uploaded_file($_FILES["document_file"]["tmp_name"], $target_file)) {
        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO dokumen (title, document_file, author) VALUES (?,?,?)");
        $stmt->bind_param("sss", $title, $document_file, $author);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "New document added successfully.";
        } else {
            echo "Error: ". $stmt->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Display documents from the database
$stmt = $conn->prepare("SELECT * FROM dokumen");
if ($stmt === false) {
    echo "Error preparing statement: ". $conn->error;
} else {
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h2>Documents:</h2>";
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "Title: ". $row["title"]. "<br>";
            echo "File: <a href='C:\\xampp\\htdocs\\practical_test\\FILE ENTER UPLOAD OK\\". $row["document_file"]. "'>". $row["document_file"]. "</a><br>";
            echo "Author: ". $row["author"];
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "There are currently no documents in the library.";
    }
}

$conn->close();
?>

</main>

<footer>
<p><?php echo date("F j, Y");?></p>
</footer>

</body>
</html>