<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing Page</title>
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
    <section id="pricing">
        <h2>Car Park Pricing</h2>
        <div class="pricing-plan">
            <h3>Daily Parking</h3>
            <p>Daily Max Rate RM8</p>
            <ul>
                <li>First Hour  RM2</li>
                <li>Every Hour Therefor RM1.50</li>
                <li>Weekends Fixed RM4</li>
                <br>
                <button type="Purchase" class="cta-button" onclick="window.location.href='paymenthistory.php'">Purchase</button>
            </ul>
        </div>
        <div class="pricing-plan">
            <h3>Season Pass</h3>
            <p>RM150/Month</p>
            <ul>
                <li>RM400 for Three Months</li>
                <li>RM650 for Six Months</li>
                <li>RM1150 for One Year</li>
                <br>
                <button type="Purchase" class="cta-button" onclick="window.location.href='paymenthistory.php'">Purchase</button>
            </ul>
        </div>
        <div class="pricing-plan">
            <h3>Parking Booking</h3>
            <p>RM1/Hour</p>
            <ul>
                <li>Choose a Spot</li>
                <li>Parking Rate as normal</li>
                <li>Please Park at your designated spot</li>
                <br>
                <button type="Purchase" class="cta-button" onclick="window.location.href='paymenthistory.php'">Purchase</button>
            </ul>
        </div>
    </section>
    <footer>
        <p>&copy; 2023 Saifut Technologies. All Rights Reserved.</p>
    </footer>
</body>
</html>