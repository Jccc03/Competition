<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#features">Features</a></li>
                <li><a href="pricing.php">Pricing</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="LoginPage.php">Log In</a></li>
                <li><a href="SignupPage.php">Sign Up</a></li>
            </ul>
        </nav>
    </header>
    
    <section id="hero">
        <h1>Welcome to Smart Car Park</h1>
        <p>By Saifut Technologies</p>
        <br>
        <a href="SignUpPage.php" class="cta-button">Sign Up Here</a>
    </section>

    <section id="Service">
        <h2>Services Provided</h2>
        <div class="Service">
            <h3>Cardless Car Park</h3>
            <p>Smart Car Park does not use any physical cards that you may lose or damage. </p>
            <p>All you have to do is park and pay through our website before you leave your car. </p>
            <p>Pricing can be found below. </p>
        </div>
        <div class="Service">
            <h3>Season Pass</h3>
            <p>Smart Car Park offers Season Passes. Pay once every month and be able to leave your car here hassle free!</p>
            <p>Pricing can be found below.</p>
        </div>
        <div class="Service">
            <h3>Parking Booking</h3>
            <p>Smart Car Park offers booking for parking spaces.</p>
            <p>Need to ensure you have a space when you come? Book a spot.</p>
            <p>Too lazy to find a space? Book a spot.</p>
            <p>All can be done through our website.</p>
            <p>Pricing can be found below.</p>
        </div>
    </section>

    <section id="pricing">
        <h2>Car Park Pricing</h2>
        <div class="pricing-plan">
            <h3>Daily Parking</h3>
            <p>Daily Max Rate RM8</p>
            <ul>
                <li>First Hour  RM2</li>
                <li>Every Hour Therefor RM1.50</li>
                <li>Weekends Fixed RM4</li>
            </ul>
        </div>
        <div class="pricing-plan">
            <h3>Season Pass</h3>
            <p>RM150/Month</p>
            <ul>
                <li>RM400 for Three Months</li>
                <li>RM650 for Six Months</li>
                <li>RM1150 for One Year</li>
            </ul>
        </div>
        <div class="pricing-plan">
            <h3>Parking Booking</h3>
            <p>RM1/Hour</p>
            <ul>
                <li>Choose a Spot</li>
                <li>Parking Rate as normal</li>
                <li>Please Park at your designated spot</li>
            </ul>
        </div>
    </section>

    <section id="contact">
    <h2>Contact Us</h2>
    <p>Have questions? Feel free to reach out.</p>
    
    <?php
    // Check if the user is authenticated (You should replace this with your actual authentication logic)
    $authenticated = false; // Replace with your authentication logic

    if (!$authenticated) {
        echo '<p style="color: red;">You must be logged in to use the contact form.</p>';
    } else {
    ?>
        <form action="process_contact_form.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            
            <button type="submit" class="cta-button">Submit</button>
        </form>
    <?php
    }
    ?>
    </section>

    <footer>
        <p>&copy; 2023 Saifut Technologies. All Rights Reserved.</p>
    </footer>
</body>
</html>
