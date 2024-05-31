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

// Get the distributor data from the form
$id_penyalur = $_POST['id_penyalur'];
$name = $_POST['name'];
$kota = $_POST['kota'];
$regiun = $_POST['regiun'];
$negara = $_POST['negara'];
$nohp = $_POST['nohp'];
$email = $_POST['email'];

// Update the distributor in the database
$sql = "UPDATE penyalur SET name='$name', kota='$kota', regiun='$regiun', negara='$negara', nohp='$nohp', email='$email' WHERE id_penyalur=$id_penyalur";

if ($conn->query($sql) === TRUE) {
    echo "Distributor updated successfully.";
} else {
    echo "Error updating distributor: " . $conn->error;
}

$conn->close();

// Redirect back to the distributors page
header("Location: penyalur.php");
exit;
?>