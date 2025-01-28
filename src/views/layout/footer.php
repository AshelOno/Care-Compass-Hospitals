<?php

// Generate CSRF token if it doesn't exist
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a new CSRF token
}
?>

<!-- Subscription Section -->
<section class="subscription-section">
    <h2>Stay Updated with Our Latest News & Offers</h2>
    <p>Subscribe to receive exclusive promotions, health tips, and updates from Care Compass Hospitals.</p>
    
    <?php
    // Display alert if there is a message
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
        echo "<script>alert('" . htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8') . "');</script>";
        unset($_SESSION['message']); // Clear message after displaying
    }
    ?>
    
    <form action="index.php" method="POST" class="subscription-form">
        <input type="email" name="email" placeholder="Enter your email address" required>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit"><i class="fas fa-paper-plane"></i> Subscribe</button>
    </form>
</section>

<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="footer-sections">
      <div class="footer-about">
        <h4>About Care Compass Hospitals</h4>
        <p>
          Care Compass Hospitals has embarked on a digital journey to be Sri Lanka’s No.1 Smart Hospital. 
          We have already introduced many innovative digital health solutions including Telemedicine, 
          Online pharmacy, Online laboratory portal, and Tele physiotherapy.
        </p>
      </div>
      <div class="footer-links">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="#">About</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Sustainability</a></li>
          <li><a href="#">Care Compass Group</a></li>
          <li><a href="#">Video Gallery</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
      <div class="footer-contact">
        <h4>Contact Us</h4>
        <p><i class="fas fa-map-marker-alt"></i> 389, Pannapitiya Road, Colombo.</p>
        <p><i class="fas fa-phone"></i> 0117 888 888</p>
        <p><i class="fas fa-envelope"></i> <a href="mailto:info@carecompasshospitals.com">info@carecompasshospitals.com</a></p>
        <div class="social-links">
          <a href="#" class="fab fa-facebook"></a>
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-instagram"></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>
        © 2025 Care Compass Hospitals. All Rights Reserved. | 
        <a href="#">Copyright</a> | 
        <a href="#">Privacy Policy</a> | 
        <a href="#">Cookie Policy</a> | 
        <a href="#">Patient Rights & Responsibilities</a> | 
        <a href="#">Data Protection Notice</a>
      </p>
      <p>Design and Development by <a href="#">NIKEEADNA</a></p>
    </div>
  </div>
</footer>

<!-- Include Font Awesome for Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<style>
  /* Subscription Section */
  .subscription-section {
    text-align: center;
    padding: 60px 20px;
    background: linear-gradient(to right, #25cc95, #077294); 
    color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 40px auto;
  }

  /* Section Heading */
  .subscription-section h2 {
    font-size: 2rem;
    margin-bottom: 10px;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
  }

  /* Section Description */
  .subscription-section p {
    font-size: 1.2rem;
    margin-bottom: 20px;
    line-height: 1.6;
  }

  /* Form Styling */
  .subscription-form {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
  }

  .subscription-form button:hover {
    background-color: #00667c;
    color: #f4f7fc;
    transform: translateY(-2px);
  }

  .subscription-form input[type="email"] {
    padding: 12px 16px;
    font-size: 1rem;
    border: none;
    border-radius: 4px;
    outline: none;
    flex: 1;
    max-width: 400px;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .subscription-form input[type="email"]:focus {
    border: 2px solid #f4f7fc;
    background-color: #f9f9f9;
  }

  /* Subscribe Button */
  .subscription-form button {
    padding: 12px 20px;
    font-size: 1rem;
    background-color: #28a745;
    border: none;
    border-radius: 4px;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .subscription-form button i {
    font-size: 1.2rem;
  }

  /* Footer */
  .footer {
    border-top: 2px solid #ddd;
    background-color: #1f2e44;
    color: #fff;
    padding: 40px 20px;
    font-size: 0.9rem;
  }

  .footer .container {
    max-width: 1200px;
    margin: 0 auto;
  }

  .footer-sections {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
  }

  .footer-about,
  .footer-links,
  .footer-contact {
    flex: 1 1 calc(33.333% - 20px);
    min-width: 250px;
  }

  .footer h4 {
    font-size: 1.1rem;
    color: #ffcc00;
    margin-bottom: 15px;
  }

  .footer p {
    line-height: 1.6;
  }

  .footer-links ul {
    list-style: none;
    padding: 0;
  }

  .footer-links a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s;
  }

  .footer-links a:hover {
    color: #ffcc00;
  }

  .footer-contact a {
    color: #ffcc00;
    text-decoration: none;
    transition: color 0.3s;
  }

  .footer-contact a:hover {
    text-decoration: underline;
  }

  .social-links a {
    color: #fff;
    margin-right: 15px;
    font-size: 1.5rem;
  }

  .social-links a:hover {
    color: #ffcc00;
  }

  .footer-bottom {
    text-align: center;
    margin-top: 30px;
    border-top: 1px solid #3a4a62;
    padding-top: 20px;
  }

  .footer-bottom a {
    color: #fff;
    text-decoration: none;
  }

  .footer-bottom a:hover {
    color: #ffcc00;
  }

  /* Responsive Design */
  @media (max-width: 768px) {  
    .footer-sections {
      flex-direction: column;
    }

    .subscription-form {
        flex-direction: column;
        gap: 15px;
    }

    .subscription-form input[type="email"], 
    .subscription-form button {
        width: 100%;
    }
  }
</style>
