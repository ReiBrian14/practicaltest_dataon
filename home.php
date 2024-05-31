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
    <li><a href="#">Home</a></li>
    <li><a href="catalog.php">Catalog</a></li>
    <li><a href="penyalur.php">Order Status</a></li>
    <li><a href="#">Distributors</a></li>
    <li><a href="unggah.php">Upload</a></li>
    <li><a href="#">Logout</a></li>
  </ul>
</nav>

<main>
  <div class="container">
    <div class="bean-of-the-day">
      <h2>Bean of the Day</h2>
      <h3>Cubita</h3>
    </div>
    <div class="sale-price">
      <h3>Sale Price</h3>
      <p>$11.00</p>
    </div>
    <div class="description">
      <h3>Description</h3>
      <p>Cubita Coffee is sun dried and hand sorted. It originates from an elevation of over 2000 meters in the Andes Mountains of Ecuador, which is located closest to the sun on the Equator. Superb aroma and rich Flavor.</p>
    </div>
  </div>
</main>

<footer>
<p><?php echo date("F j, Y");?></p>
</footer>

</body>
</html>