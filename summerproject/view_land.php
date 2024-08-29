<?php include('check_login.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Land Property</title>

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
                            <li><a href="land.html">Land</a></li>
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
                <img src="images/land1.jpg" alt="Land Image">
            </div>
            <div class="small-images">
                <img src="images/l1.jpg" alt="Image 1">
                <img src="images/l2.jpg" alt="Image 2">
                <img src="images/l3.jpg" alt="Image 3">
                <img src="images/l4.jpg" alt="Image 4">
            </div>
        </div>
        <h3 class="name">Spacious Land for Sale in Bhaktapur</h3>
        <p class="location"><i class="fas fa-map-marker-alt"></i><span>Nagarkot, Bhaktapur</span></p>
        <div class="info">
            <p><i class="fas fa-tag"></i><span>Price: 1 Crore</span></p>
            <p><i class="fas fa-user"></i><span>Owner: Mr. Prasad</span></p>
            <p><i class="fas fa-building"></i><span>Property Type: Land</span></p>
            <p><i class="fas fa-house"></i><span>Offer Type: Sale</span></p>
            <p><i class="fas fa-calendar"></i><span>Listed: 06-01-2024</span></p>
        </div>
        <h3 class="title">Details</h3>
        <div class="flex">
            <div class="box">
                <p><i>Area:</i><span>2000 sqft</span></p>
                <p><i>Status:</i><span>Available</span></p>
                <p><i>Road Access:</i><span>Yes</span></p>
                <p><i>Water Supply:</i><span>Yes</span></p>
                <p><i>Electricity:</i><span>Yes</span></p>
            </div>
            <div class="box">
                <p><i>Distance from Main Road:</i><span>500 meters</span></p>
                <p><i>Facing:</i><span>North</span></p>
                <p><i>Land Type:</i><span>Commercial</span></p>
            </div>
        </div>
        <h3 class="title">Facilities</h3>
        <div class="flex">
            <div class="box">
                <p><i class="fas fa-check"></i><span>Road Access</span></p>
                <p><i class="fas fa-check"></i><span>Water Supply</span></p>
                <p><i class="fas fa-check"></i><span>Electricity</span></p>
            </div>
            <div class="box">
                <p><i class="fas fa-check"></i><span>Market Area</span></p>
                <p><i class="fas fa-check"></i><span>Nearby Schools</span></p>
                <p><i class="fas fa-check"></i><span>Nearby Hospitals</span></p>
            </div>
        </div>
        <h3 class="title">Description</h3>
        <p class="description">This spacious piece of land is ideal for commercial development. It offers convenient access to the main road, water, and electricity connections, making it perfect for building purposes. The land is situated in a rapidly developing area, ensuring great investment potential.</p>

        <!-- Form to submit property information to store_property.php -->
        <form action="dashboard.php" method="post" id="property-form">
            <input type="hidden" name="property_name" value="Spacious Land for Sale in Bhaktapur">
            <input type="hidden" name="location" value="Nagarkot, Bhaktapur">
            <input type="hidden" name="price" value="10000000"> <!-- 1 Crore -->
            <input type="hidden" name="owner" value="Mr. Prasad">
            <input type="hidden" name="property_type" value="land">
            <input type="hidden" name="offer_type" value="sale">
            <input type="hidden" name="description" value="This spacious piece of land is ideal for commercial development. It offers convenient access to the main road, water, and electricity connections, making it perfect for building purposes. The land is situated in a rapidly developing area, ensuring great investment potential.">
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
