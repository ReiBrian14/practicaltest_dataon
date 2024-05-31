<!DOCTYPE html>
<html>
<head>
<title>Coffee Valley</title>
<link rel="stylesheet" href="home_style.css">
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
    <li><a href="">Order Status</a></li>
    <li><a href="penyalur.php">Distributors</a></li>
    <li><a href="unggah.php">Upload</a></li>
    <li><a href="#">Logout</a></li>
  </ul>
</nav>

<main>
<?php
include "config/koneksi.php";

// SQL query to select data from the coffee table
$sql = "SELECT * FROM bean";
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
  echo "Error: ". $conn->error;
} else {
  // Check if there are any results
  if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table style='border-collapse: collapse;'>
          <tr>
            <th>Bean</th>
            <th>Description</th>
            <th>Price/Unit</th>
          </tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr>
              <td style='padding: 10px; text-align: left;'>{$row["name"]}</td>
              <td style='padding: 10px; text-align: left;'>{$row["description"]}</td>
              <td style='padding: 10px; text-align: right;'>{$row["harga"]}</td>
            </tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
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