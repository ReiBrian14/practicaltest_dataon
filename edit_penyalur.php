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
    <li><a href="unggah.php">Logout</a></li>
  </ul>
</nav>

<main>
<h1>Edit Distributor</h1>
<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffe_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID of the distributor to edit
$distributorId = $_GET['id'];

// Get the distributor data from the database
$sql = "SELECT * FROM penyalur WHERE id_penyalur = $distributorId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();

    // Display the edit form
    echo "<form method='post' action='update_distributor.php'>";
    echo "<input type='hidden' name='id_penyalur' value='" . $row["id_penyalur"] . "'>";

    echo "<label for='name'>Distributor Name:</label>";
    echo "<input type='text' name='name' id='name' value='" . $row["name"] . "' required><br>";

    echo "<label for='kota'>Kota:</label>";
    echo "<input type='text' name='kota' id='kota' value='" . $row["kota"] . "' required><br>";

    echo "<label for='regiun'>Regiun:</label>";
    echo "<input type='text' name='regiun' id='regiun' value='" . $row["regiun"] . "' required><br>";

    echo "<label for='negara'>Negara:</label>";
    echo "<input type='text' name='negara' id='negara' value='" . $row["negara"] . "' required><br>";

    echo "<label for='nohp'>Telpon:</label>";
    echo "<input type='text' name='nohp' id='nohp' value='" . $row["nohp"] . "' required><br>";

    echo "<label for='email'>Email:</label>";
    echo "<input type='text' name='email' id='email' value='" . $row["email"] . "' required><br>";

    echo "<input type='submit' value='Save Changes'>";
    echo "</form>";
} else {
    echo "Distributor not found.";
}

$conn->close();
?>
</main>

<footer>
<p><?php echo date("F j, Y");?></p>
</footer>

</body>
</html>