<?php
  require_once "php_script/db_connect.php";
  require_once 'php_script/fetch_reviews.php';
  // echo '<pre>';
  // print_r($grocessaryArr);
  // print_r($restaurantArr);
  // print_r($laundromatArr);
  // print_r($coffeeArr);
  // print_r($supermarketArr);
  // print_r($postalArr);
  // print_r($bankArr);
  // print_r($hairArr);
  // print_r($museumArr);
  // die;
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reviews | Dog friendly</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- styles -->
    <link rel="stylesheet" href="assets/reviews/css/style.css" />
    <!-- <link rel="stylesheet" href="assets/reviews/css/responsive.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom-review.css">
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
        <h2>Venue Information</h2>
        <p style="font-size: 20px; text-align: center;">Types of Businesses</p>
      </div>
      <div class="venue-container">
        <div class="venue-button">
          <div class="button">
            <button class="tabLinks active" onclick="openTab(event, 'coffee')">Coffee Shope</button>
          </div>
          <div class="button"><button class="tabLinks" onclick="openTab(event, 'restaurant')">Restaurant</button></div>
          <div class="button"><button class="tabLinks" onclick="openTab(event, 'supermarket')">Supermarket</button></div>
          <div class="button">
            <button class="tabLinks" onclick="openTab(event, 'grocery')">Grocery</button>
          </div>
          <div class="button">
            <button class="tabLinks" onclick="openTab(event, 'laundromat')">Laundromat</button>
          </div>
          <div class="button">
            <button class="tabLinks" onclick="openTab(event, 'postal')">Postal Service</button>
          </div>
          <div class="button">
            <button class="tabLinks" onclick="openTab(event, 'hair')">Hair Salon</button>
          </div>
          <div class="button">
            <button class="tabLinks" onclick="openTab(event, 'bank')">Bank</button>
          </div>
          <div class="button">
            <button class="tabLinks" onclick="openTab(event, 'museum')">Museum</button>
          </div>
        </div>

        <!-- Venue Content  -->
        <div id="coffee" class="venue-content" style="display: block;">
          <div class="title">
            <h2>Coffee Shop</h2>
          </div>
          <!-- Venues  -->
          <div class="venues">
            <?php
              if (count($coffeeArr) < 1) {
                $noBusiness = 'No business registered in this category';
                echo $noBusiness;
              }

              foreach ($coffeeArr as $key => $value) {
                // if(length.$coffeeArr > 0){
                  $average=(!empty($value['average_review'])) ? $value['average_review'] : 'Not rated yet';
                  echo '<div class="venues-item">
                    <div class="venue-photo">
                      <img src="uploads/'.$value['business_picture'].'" alt="Photo">
                    </div>
                    <div class="venue-info">
                      <h3>'.$value['business_name'].'</h3>
                      <p class="info"><b>Adress:</b> '.$value['full_address'].'</p>
                      <p class="rating"><a href="all-reviews.php?ref='.$value['business_id'].'">Reviews: <span>'.$average.' <i class="fa fa-star"></i> ('.$value['review_count'].')</span></a></p>
                      <button class="ratingBtn feedback-button" data-id="'.$value['business_id'].'" data-average="'.$average.'" data-count="'.$value['review_count'].'" onclick="feedbackModal(this)"> Leave Feedback</button>
                    </div>
                  </div>';
                // }else{}
              } 
            ?>
          </div>
        </div>

        <div id="restaurant" class="venue-content">
          <div class="title">
            <h2>Restaurant</h2>
          </div>

          <!-- Venues  -->
          <div class="venues">
            <?php
              if (count($restaurantArr) < 1) {
                $noBusiness = 'No business registered in this category';
                echo $noBusiness;
              }
              foreach ($restaurantArr as $key => $value) {
                $average=(!empty($value['average_review'])) ? $value['average_review'] : 'Not rated yet';
                echo '<div class="venues-item">
                  <div class="venue-photo">
                    <img src="uploads/'.$value['business_picture'].'" alt="Photo">
                  </div>
                  <div class="venue-info">
                    <h3>'.$value['business_name'].'</h3>
                    <p class="info"><b>Adress:</b> '.$value['full_address'].'</p>
                    <p class="rating"><a href="all-reviews.php?ref='.$value['business_id'].'">Reviews: <span>'.$average.' <i class="fa fa-star"></i> ('.$value['review_count'].')</span></a></p>
                    <button class="ratingBtn feedback-button" data-id="'.$value['business_id'].'" data-average="'.$average.'" data-count="'.$value['review_count'].'" onclick="feedbackModal(this)"> Leave Feedback</button>
                  </div>
                </div>';
              } 
            ?>
          </div>
        </div>

        <div id="supermarket" class="venue-content">
          <div class="title">
            <h2>Supermarket</h2>
          </div>

          <!-- Venues  -->
          <div class="venues">

            <?php
            if (count($supermarketArr) < 1) {
                $noBusiness = 'No business registered in this category';
                echo $noBusiness;
              }
              foreach ($supermarketArr as $key => $value) {
                $average=(!empty($value['average_review'])) ? $value['average_review'] : 'Not rated yet';
                echo '<div class="venues-item">
                  <div class="venue-photo">
                    <img src="uploads/'.$value['business_picture'].'" alt="Photo">
                  </div>
                  <div class="venue-info">
                    <h3>'.$value['business_name'].'</h3>
                    <p class="info"><b>Adress:</b> '.$value['full_address'].'</p>
                    <p class="rating"><a href="all-reviews.php?ref='.$value['business_id'].'">Reviews: <span>'.$average.' <i class="fa fa-star"></i> ('.$value['review_count'].')</span></a></p>
                    <button class="ratingBtn feedback-button" data-id="'.$value['business_id'].'" data-average="'.$average.'" data-count="'.$value['review_count'].'" onclick="feedbackModal(this)"> Leave Feedback</button>
                  </div>
                </div>';
              } 
            ?>
          </div>
        </div>

        <div id="grocery" class="venue-content">
          <div class="title">
            <h2>Grocery</h2>
          </div>
        
          <!-- Venues  -->
          <div class="venues">
            <?php
            if (count($grocessaryArr) < 1) {
                $noBusiness = 'No business registered in this category';
                echo $noBusiness;
              }
              foreach ($grocessaryArr as $key => $value) {
                $average=(!empty($value['average_review'])) ? $value['average_review'] : 'Not rated yet';
                echo '<div class="venues-item">
                  <div class="venue-photo">
                    <img src="uploads/'.$value['business_picture'].'" alt="Photo">
                  </div>
                  <div class="venue-info">
                    <h3>'.$value['business_name'].'</h3>
                    <p class="info"><b>Adress:</b> '.$value['full_address'].'</p>
                    <p class="rating"><a href="all-reviews.php?ref='.$value['business_id'].'">Reviews: <span>'.$average.' <i class="fa fa-star"></i> ('.$value['review_count'].')</span></a></p>
                    <button class="ratingBtn feedback-button" data-id="'.$value['business_id'].'" data-average="'.$average.'" data-count="'.$value['review_count'].'" onclick="feedbackModal(this)"> Leave Feedback</button>
                  </div>
                </div>';
              } 
            ?>
          </div>
        </div>

        <div id="laundromat" class="venue-content">
          <div class="title">
            <h2>Laundromat</h2>
          </div>
          <!-- Venues  -->
          <div class="venues">
            <?php
            if (count($laundromatArr) < 1) {
                $noBusiness = 'No business registered in this category';
                echo $noBusiness;
              }
              foreach ($laundromatArr as $key => $value) {
                $average=(!empty($value['average_review'])) ? $value['average_review'] : 'Not rated yet';
                echo '<div class="venues-item">
                  <div class="venue-photo">
                    <img src="uploads/'.$value['business_picture'].'" alt="Photo">
                  </div>
                  <div class="venue-info">
                    <h3>'.$value['business_name'].'</h3>
                    <p class="info"><b>Adress:</b> '.$value['full_address'].'</p>
                    <p class="rating"><a href="all-reviews.php?ref='.$value['business_id'].'">Reviews: <span>'.$average.' <i class="fa fa-star"></i> ('.$value['review_count'].')</span></a></p>
                    <button class="ratingBtn feedback-button" data-id="'.$value['business_id'].'" data-average="'.$average.'" data-count="'.$value['review_count'].'" onclick="feedbackModal(this)"> Leave Feedback</button>
                  </div>
                </div>';
              } 
            ?>
          </div>
        </div>

        <div id="postal" class="venue-content">
          <div class="title">
            <h2>Postal Service</h2>
          </div>

          <!-- Venues  -->
          <div class="venues">
            <?php
            if (count($postalArr) < 1) {
                $noBusiness = 'No business registered in this category';
                echo $noBusiness;
              }
              foreach ($postalArr as $key => $value) {
                $average=(!empty($value['average_review'])) ? $value['average_review'] : 'Not rated yet';
                echo '<div class="venues-item">
                  <div class="venue-photo">
                    <img src="uploads/'.$value['business_picture'].'" alt="Photo">
                  </div>
                  <div class="venue-info">
                    <h3>'.$value['business_name'].'</h3>
                    <p class="info"><b>Adress:</b> '.$value['full_address'].'</p>
                    <p class="rating"><a href="all-reviews.php?ref='.$value['business_id'].'">Reviews: <span>'.$average.' <i class="fa fa-star"></i> ('.$value['review_count'].')</span></a></p>
                    <button class="ratingBtn feedback-button" data-id="'.$value['business_id'].'" data-average="'.$average.'" data-count="'.$value['review_count'].'" onclick="feedbackModal(this)"> Leave Feedback</button>
                  </div>
                </div>';
              } 
            ?>
          </div>
        </div>

        <div id="hair" class="venue-content">
          <div class="title">
            <h2>Hair Salon</h2>
          </div>

          <!-- Venues  -->
          <div class="venues">
            <?php
            if (count($hairArr) < 1) {
                $noBusiness = 'No business registered in this category';
                echo $noBusiness;
              }
              foreach ($hairArr as $key => $value) {
                $average=(!empty($value['average_review'])) ? $value['average_review'] : 'Not rated yet';
                echo '<div class="venues-item">
                  <div class="venue-photo">
                    <img src="uploads/'.$value['business_picture'].'" alt="Photo">
                  </div>
                  <div class="venue-info">
                    <h3>'.$value['business_name'].'</h3>
                    <p class="info"><b>Adress:</b> '.$value['full_address'].'</p>
                    <p class="rating"><a href="all-reviews.php?ref='.$value['business_id'].'">Reviews: <span>'.$average.' <i class="fa fa-star"></i> ('.$value['review_count'].')</span></a></p>
                    <button class="ratingBtn feedback-button" data-id="'.$value['business_id'].'" data-average="'.$average.'" data-count="'.$value['review_count'].'" onclick="feedbackModal(this)"> Leave Feedback</button>
                  </div>
                </div>';
              } 
            ?>
          </div>
        </div>

        <div id="bank" class="venue-content">
          <div class="title">
            <h2>Bank</h2>
          </div>
          <!-- Venues  -->
          <div class="venues">
            <?php
            if (count($bankArr) < 1) {
                $noBusiness = 'No business registered in this category';
                echo $noBusiness;
              }
              foreach ($bankArr as $key => $value) {
                $average=(!empty($value['average_review'])) ? $value['average_review'] : 'Not rated yet';
                echo '<div class="venues-item">
                  <div class="venue-photo">
                    <img src="uploads/'.$value['business_picture'].'" alt="Photo">
                  </div>
                  <div class="venue-info">
                    <h3>'.$value['business_name'].'</h3>
                    <p class="info"><b>Adress:</b> '.$value['full_address'].'</p>
                    <p class="rating"><a href="all-reviews.php?ref='.$value['business_id'].'">Reviews: <span>'.$average.' <i class="fa fa-star"></i> ('.$value['review_count'].')</span></a></p>
                    <button class="ratingBtn feedback-button" data-id="'.$value['business_id'].'" data-average="'.$average.'" data-count="'.$value['review_count'].'" onclick="feedbackModal(this)"> Leave Feedback</button>
                  </div>
                </div>';
              } 
            ?>
          </div>
        </div>

        <div id="museum" class="venue-content">
          <div class="title">
            <h2>Museum</h2>
          </div>
          <!-- Venues  -->
          <div class="venues">
            <?php
            if (count($museumArr) < 1) {
                $noBusiness = 'No business registered in this category';
                echo $noBusiness;
              }
              foreach ($museumArr as $key => $value) {
                $average=(!empty($value['average_review'])) ? $value['average_review'] : 'Not rated yet';
                echo '<div class="venues-item">
                  <div class="venue-photo">
                    <img src="uploads/'.$value['business_picture'].'" alt="Photo">
                  </div>
                  <div class="venue-info">
                    <h3>'.$value['business_name'].'</h3>
                    <p class="info"><b>Adress:</b> '.$value['full_address'].'</p>
                    <p class="rating"><a href="all-reviews.php?ref='.$value['business_id'].'">Reviews: <span>'.$average.' <i class="fa fa-star"></i> ('.$value['review_count'].')</span></a></p>
                    <button class="ratingBtn feedback-button" data-id="'.$value['business_id'].'" data-average="'.$average.'" data-count="'.$value['review_count'].'" onclick="feedbackModal(this)"> Leave Feedback</button>
                  </div>
                </div>';
              } 
            ?>
          </div>
        </div>

        <div class="rating-container">
          <!-- feedback pop up -->
          <div class="ratingPopup popup" id="feedbackContainer">
            <div class="popup-content">
              <div class="popup-container">
                <p class="popup-title">Rate this page</p>
                <form action="php_script/save_review.php" method="POST">
                  <div class="stars">
                  <fieldset class="rating form-input" required>
                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" / checked><label class = "full" for="star1" title="1 star"></label>
                    </fieldset>
                </div>
                  <input type="text" id="name" placeholder="Name" name="name" required>
                  <input type="email" id="email" placeholder="Email" name="email" required>
                  <!-- <input type="text" id="businessName" placeholder="Business Name" required> -->
                  <textarea id="ratingComment" placeholder="Leave a comment" name="feedback"></textarea required>
                  <input type="hidden" id="businessId" class="form-input" name="businessId" >
                  <input type="hidden" id="countId" class="form-input" name="countId" >
                  <input type="hidden" id="averageId" class="form-input" name="averageId" >
                <button type="submit" class="submitRatingBtn" name="saveReview">Submit</button>
                </form>
                <div class="close-button">
                  <button class="btn" onclick="closeFeedback(this)" id="closeBtn"><i class="fa fa-close"></i></button>
                </div>
              </div>
            </div>
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

<script>
function feedbackModal(el){
  console.log(this);
  const rating=document.getElementById("feedbackContainer");
  console.log(rating);
  rating.style.display = "flex";


  console.log(el.getAttribute('data-id'));
  var id=el.getAttribute('data-id');
  var average=el.getAttribute('data-average');
  var count=el.getAttribute('data-count');

   
  var input=document.getElementById('businessId');
  input.value = id;

  var countNew=document.getElementById('countId');
  countNew.value = count;


  var averageNew=document.getElementById('averageId');
  averageNew.value = average;
}

function closeFeedback(el) {
  const modal=document.getElementById("feedbackContainer");
  modal.querySelector('form').reset();
  modal.style.display = "none";

}

</script>