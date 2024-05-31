<!DOCTYPE html>
<html>
<head>
<title>Coffee Valley Login</title>

</head>
<body>
<link rel="stylesheet" href="style.css">
<div class="container">
  <img src="asset\image\already_removebg.png" alt="">
  <h1>Coffee Valley</h1>
  <p>Taste the love in every cup!</p>
  <p>One Alewife Center 3rd Floor<br>Cambridge, MA 02140</p>

  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="user_id">User ID :</label>
    <input type="text" id="user_id" name="user_id" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" name="login" value="Login">
  </form>

  <?php
include "config/koneksi.php";
session_start();

if (isset($_POST['login'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    $query = "SELECT * FROM akun WHERE user_id=? AND password=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $user_id, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login successful, redirect to home.php
        header('Location: home.php');
        exit;
    } else {
        echo 'ID or password is incorrect!';
    }
}
?>
</div>

</body>
</html>