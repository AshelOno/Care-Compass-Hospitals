<?php
// Include the config.php file which defines BASE_PATH
include_once(__DIR__ . '/../../config.php');  // Adjusted path to config.php

// Function to render sections dynamically
function render_section($id, $title, $content) {
    echo "<section id='$id' class='section'>";
    echo "<h2>$title</h2>";
    echo "<p>$content</p>";
    echo "</section>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Care Compass Hospitals - Providing international standard healthcare with safety, quality, and compassion.">
    <title>Care Compass Hospitals</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f9f9f9;
        }

        h1, h2 {
            margin: 0;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #1b5e20;
        }

        /* Header Section */
        .hero1 {
            padding: 50px 20px;
            color: white;
            background: url('../public/images/vintage-dial-telephone-handset_1.jpg') no-repeat center center / cover;
            text-align: center;
            position: relative;
        }

        .hero1::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .hero1-content {
            position: relative;
            z-index: 1;
        }

        .hero1 h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .hero1 p {
            font-size: 1rem;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Hero */
        .hero {
            padding: 40px 10%;
            align-items: center;
        }

        .hero h1 {
            margin: 10px auto;
            font-size: 2.5rem;
            margin-top: 40px;
            color:  #00667c;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .nav {
            background-color: #25cc95;
            color: white;
            padding: 10px 5%;
            display: flex;
            justify-content: left;
            align-items: center;
        }

        .navbar {
            display: flex;
            gap: 10px; 
            align-items: center;
        }

        .navbar a {
            font-weight: bold;
            font-size: 1rem;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
            word-spacing: 4px; 
        }

        .navbar a:hover {
            background-color: #52a96b;
        }

        /* Responsive Navbar */
        .navbar-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: white;
            background: none;
            border: none;
            padding: 5px;
        }

        .navbar-menu {
            display: flex;
            flex-direction: row; /* Default behavior */
            gap: 10px;
        }

        @media (max-width: 768px) {
            .navbar-menu {
                display: none; 
                flex-direction: column; 
                gap: 10px;
                background-color: #63cc7d;
                padding: 10px;
                position: absolute;
                top: 100%; /* Below the navbar */
                left: 0;
                right: 0;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                border-radius: 0 0 8px 8px;
            }

            .navbar-toggle {
                display: block; /* Shows the toggle button */
            }

            .navbar-menu.active {
                display: flex; /* Displays the menu when active */
            }
        }

        /* Sections */
        .section {
            padding: 30px 10%;
            background: white;
            margin: 0px auto;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .section:nth-child(even) {
            background-color: #f3f3f3;
        }

        .section h2 {
            color:  #00667c;
        }

        .section p {
            font-size: 1rem;
            margin: 10px 0;
        }

    </style>
</head>
<body>

    <!-- Header Section -->
    <section class="hero1">
        <div class="hero1-content">
            <h1>About Care Compass Hospitals</h1>
            <p>At Hemas Hospitals, we strive to offer you international standard care assured with safety, best clinical outcomes, and customer experience.</p>
        </div>
    </section>

    <!-- Hero Section -->
    <header class="hero">
        <section>
            <h1>ABOUT</h1>
        </section>
        <section>
            <div class="nav">
                <nav>
                    <span class="navbar-toggle" onclick="toggleNavbar()">☰</span>
                    <div class="navbar-menu">
                        <a href="#about">AboutUs</a>
                        <a href="#vision-mission">Vision&Mission</a>
                        <a href="#promise">OurPromise</a>
                        <a href="#awards">Accreditations</a>
                        <a href="#services">Services</a>
                        <a href="#care">CareforYou</a>
                    </div>
                </nav>
            </div>

        </section>

    </header>

    <!-- Main Content -->
    <main>
        <?php
        render_section('about', 'About Care Compass Hospitals', 'Welcome to Care Compass Hospitals. Our internationally accredited facilities ensure patient safety with highly specialized medical care, including tertiary and super-specialty services.');
        render_section('vision-mission', 'Vision & Mission', 'Our vision and mission revolve around providing superior healthcare services and ensuring patient safety while adhering to international standards.We win by serving the Sri Lankan community,
         delivering seamless end-to-end healthcare solutions which are affordable & easily accessible, with best clinical outcomes and superior customer experience. We do this by adopting best global practices, highest international & Sri Lankan standards, innovative digital & tech solutions, productivity & efficiency improvement tools together with strategic investments & continuous talent development.');
        render_section('promise', 'Our Promise', ' We are a chain of multi-specialty hospitals offering tertiary and super specialty care in compliance with international standards ensuring highest levels of patient safety and superior clinical outcomes.

We use innovation to continuously improve productivity, efficiency, clinical care and customer satisfaction. We place customer at the centre of all we do and and strive to improve customer experience.');
        render_section('awards', 'Accreditations & Awards', ' We understand that internationally and locally accepted standards can definitely improve the safety and clinical outcomes of our patients. Mindful of this,
         we’ve obtained a number of accreditations from global and local bodies. We are the only Sri Lankan hospital to have obtained the coveted ACHSI – Australian Council for Healthcare Standards International Accreditation for the third consecutive term. You are guaranteed superior safety standards at Hemas Hospitals as we have put in place systems, process and technology in line with ACHSI guidelines as well as locally benchmarked guidelines.');
        render_section('services', 'Our Services', ' We take care of your preventive and curative healthcare requirements at our state-of-the-art facilities. Collectively, our hospitals can accommodate 190 in-house patients where you can be rest assured of receiving care on par with international standards. Our island wide laboratory services network is well-equipped with the cutting-edge technology, 
        equipment and skilled professionals to provide accurate diagnostic investigations. We’ve purposely built our hospitals to align with international standards and equipped each area with the latest technological advancements. You can visit our Accident and Emergency units any time during the day and night to receive medical or surgical emergency care.');
        render_section('care', 'We Take Care of You', 'Our ultra-clean environments, experienced healthcare professionals, and well-designed rooms ensure comfort and expedited recovery for you and your loved ones.');
        ?>
    </main>

    <script>
        function toggleNavbar() {
            const navbarMenu = document.querySelector('.navbar-menu');
            navbarMenu.classList.toggle('active');
        }
    </script>
</body>
</html>
