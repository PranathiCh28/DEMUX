<?php
// Start session to access logged-in user info
session_start();
$role = $_SESSION['role'] ?? 'guest';
$username = $_SESSION['username'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AgriConnect</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    /* Navbar styling */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #2e7d32;
      padding: 10px 20px;
      color: white;
    }

    .navbar .logo {
      font-size: 22px;
      font-weight: bold;
    }

    .navbar ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    .navbar ul li {
      position: relative; /* important for dropdown */
      margin-left: 20px;
    }

    .navbar ul li a {
      color: white;
      text-decoration: none;
      font-size: 16px;
      padding: 8px;
      display: block;
    }

    .navbar ul li a:hover {
      background-color: #1b5e20;
      border-radius: 5px;
    }

    /* Dropdown menu */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: white;
      min-width: 150px;
      box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: #2e7d32;
      padding: 10px 15px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    /* Show dropdown on hover */
    .navbar ul li:hover .dropdown-content {
      display: block;
    }

    /* Hero image */
    .hero {
      width: 100%;
      height: 25vh;
      background: url('https://images.unsplash.com/photo-1592398748464-2d7dcd5c5e3b?auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
    }

    /* Services section */
    .services {
      padding: 30px;
      text-align: center;
    }

    .services h2 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #2e7d32;
    }

    .services ul {
      list-style-type: none;
      padding: 0;
    }

    .services ul li {
      font-size: 18px;
      margin: 10px 0;
    }

    /* Greeting */
    .greeting {
      padding: 20px;
      font-size: 18px;
      color: #2e7d32;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="logo">🌱 AgriConnect</div>
    <ul>
      <?php if($role == 'guest'): ?>
        <li><a href="login.php">Login</a></li>
      <?php elseif($role == 'farmer'): ?>
        <li><a href="ask.html">Ask Question</a></li>
        <li><a href="qna.php">View QnA</a></li>
        <li><a href="logout.php">Logout</a></li>
      <?php elseif($role == 'expert'): ?>
        <li><a href="qna.php">Answer Questions</a></li>
        <li><a href="videos.php">Upload Videos</a></li>
        <li><a href="logout.php">Logout</a></li>
      <?php elseif($role == 'admin'): ?>
        <li><a href="../admin/dashboard.php">Dashboard</a></li>
        <li><a href="logout.php">Logout</a></li>
      <?php endif; ?>

      <li>
        <a href="#">Resources ▼</a>
        <div class="dropdown-content">
          <a href="videos.php">Videos</a>
          <a href="posts.php">Posts</a>
        </div>
      </li>
      <li><a href="#">Contact Us</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Store</a></li>
    </ul>
  </div>

  <!-- Greeting -->
  <?php if($role != 'guest'): ?>
    <div class="greeting">Hello, <?= htmlspecialchars($username) ?>!</div>
  <?php endif; ?>

  <!-- Hero Image -->
  <div class="hero"></div>

  <!-- Services Section -->
  <div class="services">
    <h2>Our Services</h2>
    <ul>
      <li>🌾 Expert Q & A</li>
      <li>🎥 Expert Vlogs</li>
      <li>☁ Weather Report</li>
      <li>📊 Mandi Rates</li>
      <li>🏛 Government Schemes in India</li>
    </ul>
  </div>

</body>
</html>