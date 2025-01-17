<?php include 'header.php';?>

<!-- Welcome Section -->
<section class="welcome-section">
    <h2>Welcome to Care Compass <br> Hospitals</h2>
    <p>We are dedicated to providing exceptional services to meet your needs. Experience quality and care like never before.</p>
    <p class="tagline">Join us in making a difference with <span class="tagline-highlight">passion and excellence</span>.</p>
    <div class="cta-buttons">
        <a href="#learn-more">Learn More</a>
        <a href="contact_us.php">Contact Us</a>
    </div>
</section>


<!-- Services Section -->
<section id="services" class="services-section">
    <h3>Our Services</h3>
    <div class="services-grid">
        <div class="service-card">
            <h4>Emergency Care</h4>
            <p>24/7 emergency care for all critical situations.</p>
        </div>
        <div class="service-card">
            <h4>Specialist Clinics</h4>
            <p>Expert consultations in a wide range of specialties.</p>
        </div>
        <div class="service-card">
            <h4>Laboratory Tests</h4>
            <p>Comprehensive lab testing with quick results.</p>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

<style>
    body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f7fc;
    background-image: url('uploads/index_bg.jpg'); 
    background-size: cover;
    background-position: center;
    background-attachment: fixed; /* Optional: for a fixed background effect */
  }
  
/* Welcome Section */
.welcome-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #25cc95 0%, #077294 100%);
    color: white;
    padding: 40px 10px;
    border-radius: 12px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    margin: 40px auto;
    max-width: 1200px;
}

.welcome-section h2 {
    font-size: 2.5rem;
    margin-bottom: 10px;
    font-weight: bold;
    text-shadow: 2px 2px rgba(0, 0, 0, 0.2);
    text-transform: uppercase;
    text-align: center;
}

.welcome-section p {
    font-size: 1.2rem;
    line-height: 1.8;
    margin-bottom: 10px;
    max-width: 800px;
    text-align: center;
}

.welcome-section .tagline {
    font-size: 1.4rem;
    font-weight: bold;
    margin-top: 10px;
    margin-bottom: 10px;
}

.welcome-section .tagline-highlight {
    color: #ffcc00;
    font-weight: bold;
}

.welcome-section .cta-buttons {
    display: flex;
    gap: 15px;
    margin-top: 10px;
}

.welcome-section .cta-buttons a {
    text-decoration: none;
    color: white;
    background-color: #ffcc00;
    padding: 15px 25px;
    font-size: 1.2rem;
    font-weight: bold;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.welcome-section .cta-buttons a:hover {
    background-color: #ff9900;
    transform: translateY(-3px);
}


/* Services Section */
.services-section {
    background-color: #f9f9f9; /* Light gray background for a clean look */
    padding: 60px 20px; /* Added padding for better spacing around the section */
  }
  
  .services-section h3 {
    text-align: center;
    font-size: 2rem; /* Slightly increased font size for better emphasis */
    margin-top: 40px;
    color: #333;
    text-transform: uppercase; /* Uppercase for a bold heading style */
    letter-spacing: 1.5px; /* Slightly increased spacing for a polished look */
  }
  
  /* Services Grid */
  .services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px; /* Increased gap for better spacing between cards */
    padding: 0 10px; /* Added horizontal padding to align with section */
  }
  
  /* Service Cards */
  .service-card {
    background-color: #fff; /* White background for the cards */
    padding: 25px; /* Increased padding for more content spacing */
    border-radius: 12px; /* Slightly rounded corners for a modern look */
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1); /* Slightly darker shadow for depth */
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .service-card h4 {
    font-size: 1.3rem; /* Slightly larger font size for better visibility */
    margin-bottom: 15px;
    color: #367589; /* Complementary color for headings */
    font-weight: 600; /* Bold weight for emphasis */
  }
  
  .service-card p {
    font-size: 1rem; /* Slightly larger font size for readability */
    color: #666;
    line-height: 1.6; /* Improved line height for better readability */
  }
  
  .service-card:hover {
    transform: translateY(-10px); /* Slightly increased hover effect */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Enhanced shadow for hover state */
    background-color: #f0f9fc; /* Subtle background change on hover */
  }
  
  


  /* Responsive Design */
  @media (max-width: 768px) {
    .top-header, .header {
      flex-direction: column;
      text-align: center;
    }
  
    .header h1 {
      padding-right: 0;
      margin-bottom: 10px;
    }
  
    .nav-list {
      flex-direction: column;
      gap: 15px;
    }
  
    .services-grid {
      grid-template-columns: 1fr;
    }
  
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
    
    /* Media Queries for Welcome Section */
    .welcome-section {
        padding: 40px 20px;
    }

    .welcome-section h2 {
        font-size: 2rem;
    }

    .welcome-section p {
        font-size: 1rem;
    }

    .welcome-section .cta-buttons {
        flex-direction: column;
    }

    .welcome-section .cta-buttons a {
        width: 100%;
        text-align: center;
    }
}

</style>
