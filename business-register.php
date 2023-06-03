<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/form/form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/custom-register.css">
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

    <div class="container">
      <div class="row">
        <h1>Registration to DogFriendly </h1>

        <div class="main offset-md-3 col-md-6">
          <!-- <main class="p-3 mb-3 bg-white"> -->
            <div class="content">
              <form class="form-group" id="contactForm" action="php_script/save_business.php" method="POST" enctype="multipart/form-data">
                <div class="Business-details">
                  <label class="col col-md-12" for="BusinessType">Business type:</label>
                  <select class="col col-md-12" id="BusinessType" name="businessType"  required>
                      <option value="grocessary-store">Grocessary Store</option>
                      <option value="restaurant">Restaurant</option>
                      <option value="laundromat">Laundromat</option>
                      <option value="coffee-shop">Coffee Shop</option>
                      <option value="supermarket">Supermarket</option>
                      <option value="postal-office">Postal Office</option>
                      <option value="Bank">Bank</option>
                      <option value="hair-saloon">Hair Salon</option>
                      <option value="museum">Museum</option>
                    </select>

                  <label class=" col col-md-12" for="BusinessName">Business Name:</label>
                  <input class="myInput col col-md-12" type="text" maxlength="20" id="BusinessName" name="businessName" required>

                  <label class=" col col-md-12" for="bnNumber">BN number:</label>
                  <input class="myInput col col-md-12" type="text" id="bnNumber" name="bnNumber" maxlength="10" required>

                  <label class=" col col-md-12" for="email">Email:</label>
                  <input class="myInput col col-md-12" type="email" id="email" name="businessEmail" required>

                  <label class=" col col-md-12" for="coordinates">Geo Coordinaties(latitude,longitude):</label>
                  <input class="myInput col col-md-12" type="text" id="coordinates" name="coordinates" required>


                  <label class=" col col-md-12" for="Address">Full Address:</label>
                  <input class="myInput col col-md-12" type="text" maxlength="" id="Address" name="businessAddress" required>

                  <label class=" col col-md-12" for="businessPicture">Business Picture:</label>

                  
                  <label class="myInput col col-md-12 file-label" for="file-input">
                    <span class="choose-file">Choose File</span>
                    <span class="file-name"></span>
                  </label>
                  <input type="file" id="file-input" name="businessPicture" accept="image/*" />
                </div>

                  <!-- <div class="myInput col col-md-12"> -->
                    <fieldset class="col col-md-12">
                      <legend class="">Choose your features</legend>
                      <div>
                        <input type="checkbox" id="smalldogs" name="smallDogs" value="small-dogs">
                        <label for="smalldogs">Small dogs are allowed</label>
                      </div>
                      <div>
                        <input type="checkbox" id="bigdogs" name="bigDogs" value="big-dogs">
                        <label for="bigdogs">Big dogs are allowed</label>
                      </div>
                      <div>
                        <input type="checkbox" id="snacks" name="snacks" value="snacks">
                        <label for="snacks">Snacks for dogs</label>
                      </div>
                      <div>
                        <input type="checkbox" id="water" name="water" value="water">
                        <label for="water">Water for dogs</label>
                      </div>
                    </fieldset>
                  


                <!-- </div> -->
                  <button class="button" type="submit" name="saveBusiness">Save Business</button>
              </form>
            </div>
          <!-- </main> -->
        </div>
      </div>
    </div>


    <footer>
      <div class='footer-content'>
        <div class="title">
          <h3 class="text-center">DOG FRIENDLY</h3>
        <p class="footerDog ">Animal Lovers</p>
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
  </body>
</html>

<script >
  const fileInput = document.getElementById('file-input');
  const fileLabel = document.querySelector('.file-label');

  fileInput.addEventListener('change', function() {
  const file = fileInput.files[0];
  if (file) {
    fileLabel.classList.add('file-selected');
    fileLabel.querySelector('.file-name').textContent = file.name;
  } else {
    fileLabel.classList.remove('file-selected');
    fileLabel.querySelector('.file-name').textContent = '';
  }
});

</script>