<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | Dog Friendly</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap"
      rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/home/home.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom-home.css">
    <style type="text/css">
       .nav{
        font-family: "Times New Roman" !important;
        line-height: normal !important;
      }
    </style>
  </head>
  <body  onload="initMap()">
    <div class="nav">
      <input type="checkbox" id="nav-check">
      <div class="nav-header">
        <div class="nav-title">
          Dog Friendly
        </div>
      </div>
      <div class="nav-btn">
        <label for="nav-check">
          <span></span>
          <span></span>
          <span></span>
        </label>
      </div>
      
      <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="business-register.php">New Business</a>
        <a href="reviews.php">Reviews</a>
      </div>
    </div>
    
    <div class="main-wrapper">
        <h1>Choose route with your dog</h1>
       
        <div>
          <form action="business-route.php" method="GET">
            <div class="locationsBtn">

              <input type="radio" name="business" id="grocessary-store" value="grocessary-store" class="main2-btn">
              <label for="grocessary-store">Grocery Store</label>

              <input type="radio" name="business" value="restaurant" id="restaurant" value="restaurant" class="main2-btn">
              <label for="restaurant">Restaurant</label>

              

              <input type="radio" name="business" id="laundromat" value="laundromat" class="main2-btn">
              <label for="laundromat">Laundromat</label>

              <input type="radio" name="business" id="coffee-shop" value="coffee-shop" class="main2-btn">
              <label for="coffee-shop">Coffee Shop</label>
            </div>

            <div class="locationsBtn">
              <input type="radio" name="business" id="supermarket" value="supermarket" class="main2-btn">
              <label for="supermarket">Supermarket</label>

              <input type="radio" name="business" id="bank" value="bank" class="main2-btn">
              <label for="bank">Bank</label>

              <input type="radio" name="business" id="postal-office" value="postal-office" class="main2-btn">
              <label for="postal-office">Postal Office</label>

              <input type="radio" name="business" id="hair-saloon" value="hair-saloon" class="main2-btn">
              <label for="hair-saloon">Hair Salon</label>
            </div>

            <div class="locationsBtn">
              <input type="radio" name="business" id="museum" value="museum" class="main2-btn">
              <label for="museum">Museum</label>
            </div>
            <!-- <h5> During the Trip I want my dog to have:</h5> -->
            <fieldset>

              <legend>During the Trip I want my dog to have</legend>

              <input class="wateri" type="checkbox" id="water" name="water" value="true">
              <label class="water" for="Water">Water</label><br>
              <input class="cookiesi" type="checkbox" id="water" name="snacks" value="true">
              <label class="cookies" for="water">Snacks </label><br>
            </fieldset>
            

            <div class="slide1">
              <button type="submit" name="selectedRoute" value="true" class="main-btn wrapper"><span>Get Started</span></button>
            </div>
          </form>
        </div>

      <div id="map"></div>
      

      <div class="blue-card">
        <div class="left-hand">
          <h2>Walk with Your Dog Through All the Places You Want</h2>
        </div>
        <div class="right-hand">
          <h5>
            Build your own daily basis walking rout with your best friend.
            find out about new Dog-Friendly places that you must visit! 
            
          </h5>
          <a class="blue-btn" href="#">
            <h3>
              Let's Start
            </h3>
           
        </a>
        </div>
      </div>
    </div>

      
    <footer>
      <div class='footer-content'>
        <div class="title">
          <h3>DOG FRIENDLY</h3>
        <p class="footerDog">Animal Lovers</p>
        </div>
        <ul class="socials">
          <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-youtube"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>

      <div class="footer-bottom">
        <p>copyright &copy; <span id="copyDate"></span> <a href="#">DogFriendly</a> </p>
        <div class="footer-menu">
          <ul class="f-menu">
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Blog</a></li>
          </ul>
        </div>
      </div>
    </footer>
    <script src="assets/home/home.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDE8X5pjW63TxC3koEmxFdQ0wKkQLhUp4I" async defer></script>
  </body>
</html>

