<?php
if(!isset($_GET['ref']) || empty($_GET['ref'])){
  header("location: reviews.php");
}
  $busness_key=$_GET['ref'];
  require_once "php_script/db_connect.php";
  require_once "php_script/fetch_all_reviews.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Venue Info</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- styles -->
    <link rel="stylesheet" href="assets/reviews/css/style.css" />
    <link rel="stylesheet" href="assets/reviews/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom-all-reviews.css">
    <style type="text/css">
       .nav{
        font-family: "Times New Roman" !important;
        line-height: normal !important;
      }
    </style>
  </head>

  <body>
    <!-- Navbar  -->
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

    <!-- Venue Section -->
    <div id="venues" class="section venue-section">
      <div class="title">
        <h2><?php echo $reviewsArr['business_name']; ?></h2>
        <p style="font-size: 16px; text-align: center;"><?php echo $reviewsArr['full_address']; ?></p>
      </div>
      <div class="venue-container">
        <div class="venue-button">
          <div class="button">
            <h1>All Reviews</h1>
            <!-- <button class="tabLinks active" onclick="openTab(event, 'coffee')">Coffee Shope</button> -->
          </div>
        </div>

        <div class="feedback-container">
          <!-- Rating List  -->
          <div id="ratingsList"> 
            <!-- New Rating  -->
            <ul class="ratings">
              <?php
                foreach ($reviewsArr['reviews'] as $key => $value) {
                  date_default_timezone_set('Asia/Jerusalem');


                  $datetime = new DateTime($value['date']);
                  $newDate=$datetime->format('Y-m-d') . "\n";
                  echo '<li class="rating">
                  <div class="stars">
                    <fieldset class="rating form-input" required>
                      <input type="radio"  value="5" '.($value["rating"] == "5" ? "checked" : "").' disabled/>
                      <label class="full" for="star5" title="5 stars"></label>
                      <input type="radio" id="star4half" name="rating" value="4.5" '.($value["rating"] == "4.5" ? "checked" : "").' disabled/>
                      <label class="half" for="star4half" title="4.5 stars"></label>
                      <input type="radio"  value="4" '.($value["rating"] == "4" ? "checked" : "").' disabled/>
                      <label class="full" for="star4" title="4 stars"></label>
                      <input type="radio"  value="3.5" '.($value["rating"] == "3.5" ? "checked" : "").' disabled/>
                      <label class="half" for="star3half" title="3.5 stars"></label>
                      <input type="radio"  value="3" '.($value["rating"] == "3" ? "checked" : "").' disabled/>
                      <label class="full" for="star3" title="3 stars"></label>
                      <input type="radio"  value="2.5" '.($value["rating"] == "2.5" ? "checked" : "").' disabled/>
                      <label class="half" for="star2half" title="2.5 stars"></label>
                      <input type="radio"  value="2" '.($value["rating"] == "2" ? "checked" : "").' disabled/>
                      <label class="full" for="star2" title="2 stars"></label>
                      <input type="radio"  value="1.5" '.($value["rating"] == "1.5" ? "checked" : "").' disabled/>
                      <label class="half" for="star1half" title="1.5 stars"></label>
                      <input type="radio"  value="1" '.($value["rating"] == "1" ? "checked" : "").' disabled/>
                      <label class="full" for="star1" title="1 star"></label>
                    </fieldset>
                  </div><br>
                  <div class="name"><b>Name:</b> '.$value['customer_name'].'</div>
                  <div class="email"><b>Email:</b> '.$value['email'].'</div>
                  <div class="comment"><b>Comment:</b> '.$value['feedback'].'</div>
                  <div class="date"><b>Rating Date:</b> '.$newDate.'</div>
                </li>';

                }
              ?>
            </ul>
          </div>
        </div>

     

        
        
      </div>
    </div>

    


    <!-- footer -->
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
    <script src="assets/reviews/js/script.js"></script>
  </body>
</html>
