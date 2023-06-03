<?php
  if(!isset($_GET['business']) || empty($_GET['business'])){
    header('location: index.php');
  }
  require_once "php_script/db_connect.php";

  $business = mysqli_real_escape_string($conn, $_GET['business']);

  if(
    isset($_GET['water']) && !empty($_GET['water']) && $_GET['water']== 'true'  && 
    isset($_GET['snacks']) && !empty($_GET['snacks']) && $_GET['snacks']== 'true'  
  ){
    $where_clause= "business_type='$business' AND water=1 AND snacks=1";
  }elseif (isset($_GET['water']) && !empty($_GET['water']) && $_GET['water']== 'true'){
    $where_clause= "business_type='$business' AND water =1";
  }elseif(isset($_GET['snacks']) && !empty($_GET['snacks']) && $_GET['snacks']== 'true'
  ){
    $where_clause= "business_type='$business' AND snacks=1";
  }else{
    $where_clause= "business_type='$business'";
  }

  $bType=$_GET['business'];
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
    <link rel="stylesheet" href="assets/css/nav.css">
    <style type="text/css">
      .nav{
        font-family: "Times New Roman" !important;
        line-height: normal !important;
      }
    </style>
  </head>
  <body>
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
        <h2>Here is the best route to your location for</h2>
      </div>
      <div class="venue-container">
        <!-- Venue Content  -->
        <div id="coffee" class="venue-content" style="display: block;">
          <div class="title">
            <h2>
              <?php  
                if(strpos($_GET['business'], '-')){
                  $bName=explode('-', $_GET['business']);
                  echo $bName['0'].''.$bName['1'];
                }else{
                  echo $_GET['business'];
                }
             ?>
               
            </h2>
          </div>

          <!-- Venues  -->
          <div class="venues" id="eroutes">
            We are getting data for you, please wait.....
          </div>
        </div>
        <!-- Rating Feedback window  -->
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
    <script type="">
      var btype="<?php echo $bType; ?>";
      var where_clause="<?php echo $where_clause; ?>";
    </script>

    <script src="assets/js/location-script.js"></script>
    <script src="assets/reviews/js/script.js"></script>
    
</body>
</html>