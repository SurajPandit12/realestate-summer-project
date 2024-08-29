<?php include('check_login.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="header">
    <nav class="navbar nav-1">
        <section class="flex">
            <a href="home.html" class="logo"><i class="fa-sharp fa-solid fa-house fa-flip" style="color: #c4213a;"></i>MyHome</a>
        </section>
    </nav>
    <nav class="navbar nav-2">
        <section class="flex">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div class="menu">
                <ul>
                    <li><a href="#">Buy<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="house.html">House</a></li>
                            <li><a href="#">Land</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Sell<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="#">House</a></li>
                            <li><a href="#">Land</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Rent</a></li>
                    <li><a href="about.html">About us</a></li>
                    <li><a href="contact.html">Contact us</a></li>
                    <li><a href="contact.html#faq">FAQs</a></li>
                </ul>
            </div>
            <ul>
                <li>
                    <li><a href="logout.php">Logout</a></li>
                </li>
            </ul>
        </section>
    </nav>
</header>

<section class="view-property">
    <div class="details">
        <div class="thumb">
            <div class="big-image">
                <img src="images/house101.jpg" alt="House Image">
            </div>
            <div class="small-images">
                <img src="images/h01.jpg" alt="Image 1">
                <img src="images/h02.jpg" alt="Image 2">
                <img src="images/h04.jpg" alt="Image 3">
                <img src="images/h05.jpg" alt="Image 4">
            </div>
        </div>
        <h3 class="name">Modern house for sale inside Kathmandu</h3>
        <p class="location"><i class="fas fa-map-marker-alt"></i><span>Jorpati, Kathmandu</span></p>
        <div class="info">
            <p><i class="fas fa-tag"></i><span>Price: 2.5 Crore</span></p>
            <p><i class="fas fa-user"></i><span>Owner: Mr Shankhar</span></p>
            <p><i class="fas fa-building"></i><span>Property Type: House</span></p>
            <p><i class="fas fa-house"></i><span>Offer Type: Sale</span></p>
            <p><i class="fas fa-calendar"></i><span>Listed: 05-01-2024</span></p>
        </div>
        <h3 class="title">Details</h3>
        <div class="flex">
            <div class="box">
                <p><i>Rooms:</i><span>3 BHK</span></p>
                <p><i>Deposit Amount:</i><span>0</span></p>
                <p><i>Status:</i><span>Ready to Move</span></p>
                <p><i>Bedrooms:</i><span>3</span></p>
                <p><i>Bathrooms:</i><span>2</span></p>
                <p><i>Balcony:</i><span>1</span></p>
            </div>
            <div class="box">
                <p><i>Carpet Area:</i><span>750 sqft</span></p>
                <p><i>Age:</i><span>3 years</span></p>
                <p><i>Room Floor:</i><span>3</span></p>
                <p><i>Total Floors:</i><span>22</span></p>
                <p><i>Furnished:</i><span>Semi-furnished</span></p>
                <p><i>Loan:</i><span>Available</span></p>
            </div>
        </div>
        <h3 class="title">Facilities</h3>
        <div class="flex">
            <div class="box">
                <p><i class="fas fa-check"></i><span>Lifts</span></p>
                <p><i class="fas fa-check"></i><span>Security Guards</span></p>
                <p><i class="fas fa-times"></i><span>Playground</span></p>
                <p><i class="fas fa-check"></i><span>Gardens</span></p>
                <p><i class="fas fa-check"></i><span>Water Supply</span></p>
                <p><i class="fas fa-check"></i><span>Power Backup</span></p>
            </div>
            <div class="box">
                <p><i class="fas fa-check"></i><span>Parking Area</span></p>
                <p><i class="fas fa-times"></i><span>Gym</span></p>
                <p><i class="fas fa-check"></i><span>Shopping Mall</span></p>
                <p><i class="fas fa-check"></i><span>Hospital</span></p>
                <p><i class="fas fa-check"></i><span>Schools</span></p>
                <p><i class="fas fa-check"></i><span>Market Area</span></p>
            </div>
        </div>
        <h3 class="title">Description</h3>
        <p class="description">This well-maintained property features spacious living areas, a modern kitchen with stainless steel appliances, and a beautifully landscaped backyard perfect for outdoor entertaining. Conveniently located near schools, parks, and shopping centers. Don't miss the opportunity to make this house your new home!</p>

        <!-- Form to submit property information to store_property.php -->
        <form action="dashboard.php" method="post" id="property-form">
            <input type="hidden" name="property_name" value="Modern house for sale inside Kathmandu">
            <input type="hidden" name="location" value="Jorpati, Kathmandu">
            <input type="hidden" name="price" value="25000000"> <!-- 2.5 Crore -->
            <input type="hidden" name="owner" value="Mr Shankhar">
            <input type="hidden" name="property_type" value="house">
            <input type="hidden" name="offer_type" value="sale">
            <input type="hidden" name="description" value="This well-maintained property features spacious living areas, a modern kitchen with stainless steel appliances, and a beautifully landscaped backyard perfect for outdoor entertaining. Conveniently located near schools, parks, and shopping centers. Don't miss the opportunity to make this house your new home!">
            <input type="submit" name="buy_property" value="Make Inquiry" class="btn">
        </form>
        
    </div>
</section>

<!-- footer section starts  -->
<footer class="footer">
    <section class="flex">
        <div class="box">
            <a href="#"><i class="fas fa-phone"></i><span>9863031182</span></a>
            <a href="#"><i class="fas fa-phone"></i><span>014256812</span></a>
            <a href="#"><i class="fas fa-envelope"></i><span>projectsuraj@gmail.com</span></a>
            <a href="#"><i class="fas fa-map-marker-alt"></i><span>Kathmandu, Minbhawan</span></a>
        </div>
        <div class="box">
            <a href="home.html"><span>MYHome</span></a>
            <a href="about.html"><span>About</span></a>
            <a href="contact.html"><span>Contact</span></a>
            <a href="listings.html"><span>All listings</span></a>
        </div>
        <div class="box">
            <a href="#"><span>facebook</span><i class="fa-brands fa-facebook" style="color: #74C0FC;"></i></a>
            <a href="#"><span>twitter</span><i class="fa-brands fa-twitter" style="color: #74C0FC;"></i></a>
            <a href="#"><span>linkedin</span><i class="fa-brands fa-linkedin"></i></a>
            <a href="#"><span>instagram</span><i class="fa-brands fa-instagram" style="color: #cc1958;"></i></a>
        </div>
    </section>
    <div class="credit">&copy; Copyright @ 2024 by Suraj Pandit | All rights reserved.</div>
</footer>

<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>
