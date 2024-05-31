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
    <li><a href="#">Distributors</a></li>
    <li><a href="unggah.php">Upload</a></li>
    <li><a href="#">Logout</a></li>
  </ul>
</nav>

<main>
<h1>Tambah Penyalur</h1>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="name">Distributor Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="kota">Kota:</label>
    <input type="text" id="kota" name="kota" required>

    <label for="regiun">State/Regiun:</label>
    <input type="text" id="regiun" name="regiun" required>

    <label for="negara">City:</label>
    <input type="text" id="negara" name="negara" required>

    <label for="nohp">Phone:</label>
    <input type="tel" id="nohp" name="nohp" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <input type="submit" value="Tambah Penyalur">
</form>

    <?php
    include "config/koneksi.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $kota = $_POST["kota"];
        $regiun = $_POST["regiun"];
        $negara = $_POST["negara"];
        $nohp = $_POST["nohp"];
        $email = $_POST["email"];
    
        $sql = "INSERT INTO penyalur (name, kota, regiun, negara, nohp, email) VALUES ('$name', '$kota', '$regiun', '$negara', '$nohp', '$email')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Penyalur berhasil ditambahkan";
        } else {
            echo "Error: ". $sql. "<br>". $conn->error;
        }
    
        $conn->close();
    }
   ?>
</main>

<footer>
<p><?php echo date("F j, Y");?></p>
</footer>

</body>
</html>