<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Care Compass Hospitals</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="index.css">
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute('href'));
          if (target) target.scrollIntoView({ behavior: 'smooth' });
        });
      });
    });
  </script>
</head>

<!-- Emergency and Appointment Section -->
<section class="top-header">
  <div class="container">
    <div class="emergency-column">
      <a href="#emergency" class="emergency">Emergency: 123-456-7890</a>
    </div>
    <div class="appointment-column">
      <a href="include/book_appoinment.php" class="appointment-link">Make an Appointment</a>
    </div>
  </div>
</section>

<!-- Header -->
<header class="header">
  <div class="container">
    <img src="uploads/healthcare.jpg" alt="Care Compass Hospitals Logo" class="logo"> 
    <h1>Care Compass Hospitals</h1>
    <nav>
      <ul class="nav-list">
        <li><a href="#home">Home</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="include/contact_us.php">Contact Us</a></li>
        <a href="login.php">Login</a>
      </ul>
    </nav>
  </div>
</header>
