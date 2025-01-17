<?php include 'include/header.php';?>

<!-- Main Section -->
<main id="home" class="main">
    <section class="welcome-section">
        <h2>Welcome to Care Compass Hospitals</h2>
        <p class="tagline tagline-primary">Dedicated to you</p>
        <p class="tagline tagline-highlight">Compassion, Innovation & Excellence</p>
        <p>
        At Care Compass Hospitals, we provide world-class medical services to meet all your healthcare needs. 
        Explore our website to book appointments, access lab results, and learn more about our specialized treatments.
        </p>
    </section>
</main>

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

<!-- Subscription Section -->
<section class="subscription-section">
    <style>
        /* Subscription Section */
        .subscription-section {
        text-align: center;
        padding: 50px 20px;
        background: linear-gradient(to right, #25cc95, #077294); /* Gradient background */
        color: white;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 40px auto;
        max-width: 800px;
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
        border: 2px solid #fff;
        background-color: #f9f9f9;
        }

        /* Subscribe Button */
        .subscription-form button {
        padding: 12px 20px;
        font-size: 1rem;
        background-color: #fff;
        color: #077294;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        transition: background-color 0.3s, transform 0.2s;
        }

        .subscription-form button:hover {
        background-color: #25cc95;
        color: #fff;
        transform: translateY(-2px);
        }

        /* Mobile Responsiveness */
        @media (max-width: 600px) {
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
    <h2>Stay Updated with Our Latest News & Offers</h2>
    <p>Subscribe to receive exclusive promotions, health tips, and updates from Care Compass Hospitals.</p>
    <form action="#" class="subscription-form" aria-label="Subscription Form">
        <input 
            type="email" 
            placeholder="Enter your email address" 
            required 
            aria-label="Email Address"
        >
        <button type="submit" aria-label="Subscribe to Newsletter">Subscribe</button>
    </form>
</section>


<?php include 'include/footer.php'; ?>
