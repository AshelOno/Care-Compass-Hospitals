<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Care Compass Hospitals</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    /* General Styles */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f7fc;
    background-image: url('uploads/index_bg.jpg'); /* Add your image path here */
    background-size: cover;
    background-position: center;
    background-attachment: fixed; /* Optional: for a fixed background effect */
  }
  
  .hidden {
    display: none;
  }
  
  /* Top Header */
  .top-header {
    display: flex;
    justify-content: space-between;
    background-color: #fff;
  }
  
  .top-header .container {
    display: flex;
    width: 100%;
    margin: 0 auto;
  }
  
  .top-header .emergency-column,
  .top-header .appointment-column {
    flex: 1;
    text-align: center;
    padding: 10px 15px;
    color: #fff;
  }
  
  .top-header .emergency-column {
    background-color: #077294;
  }
  
  .top-header .appointment-column {
    background-color: #25cc95;
  }
  
  .top-header a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
  }
  
  .top-header a:hover {
    text-decoration: underline;
  }
  
  /* Header */
  .header {
    display: flex;
    align-items: center;
    background-color: #fff;
    color: #00667c;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
    padding: 10px 20px;
  }
  
  .header .container {
    display: flex;
    align-items: center;
    width: 100%;
  }
  
  .header h1 {
    font-size: 1.8rem;
    font-weight: 600;
    margin: 0;
    padding-right: 20px;
  }
  
  .logo {
    width: 100px;
    height: auto;
  }
  
  .nav-list {
    display: flex;
    margin-left: auto;
    list-style: none;
    gap: 25px;
  }
  
  .nav-list a {
    color: #00667c;
    text-decoration: none;
    font-weight: 500;
    text-transform: uppercase;
  }
  
  .nav-list a:hover {
    text-decoration: underline;
  }
  </style>
  
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
