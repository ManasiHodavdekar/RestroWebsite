<?php
  session_start();
  if (!isset($_SESSION['Username'])) {
      header('location:signup.php');
  }
$conn = mysqli_connect('localhost','id11454502_root','12345','id11454502_cart');
$username = $_SESSION['Username'];
$query = "SELECT type from customer where Name= '$username'";
$result = mysqli_query($conn,$query);
$row = mysqli_num_rows($result);

if($row){
  $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
}
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Gourmet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800|DM+Serif+Display:400,400i&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="ftco-32x32.png">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/magnific-popup.css">


    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <header role="banner" class="fix">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark" >
        <div class="container">
          <a class="navbar-brand nav-color" id="html" href="index.html">BroCode</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
              <li class="nav-item">
                <a class="nav-link active nav-color" href="index.php">Home</a>
              </li>

              <?php if($data[0]['type']!= "admin"): ?>
              <li class="nav-item"><a class="nav-link nav-color" href="#aboutus">About us</a> </li>
              <?php endif; ?>

              <?php if($data[0]['type']!= "admin"): ?>
              <li class="nav-item">
                <a class="nav-link nav-color" href="http://localhost/website/review.php">Reviews</a>
              </li>
              <?php endif; ?>

              <?php if($data[0]['type']!= "admin"): ?>
               <li class="nav-item">
                <a class="nav-link" href="news.html">News</a>
               </li>
              <?php endif; ?>

              <!--<?php if($data[0]['type']!= "admin"): ?>
               <li class="nav-item">
                <a class="nav-link" href="#">Your Requests</a>
               </li>
              <?php endif; ?>-->

              <?php if($data[0]['type']== "admin"): ?>
                <li class="nav-item">
                <a class="nav-link" href="http://localhost/website/dashboard.php">Dashboard</a>
               </li>
              <?php endif; ?> 
              
              <li class="nav-item">
                <a class="nav-link nav-color log" href="logout.php">LOG OUT</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->
    
    <div class="slider-wrap">
      <section class="home-slider owl-carousel">


        <div class="slider-item" style="background-image: url('img/hero_2.jpg');">
          <div class="container">
            <div class="row slider-text align-items-center justify-content-center">
              <div class="col-md-8 text-center col-sm-12 ">
                <?php if(isset($_SESSION['Username'])) :?>
              
                <h1>Welcome <?php echo $_SESSION['Username']; ?></h1>
             
             <?php endif; ?> 
                <p data-aos="fade-up" data-aos-delay="200"><a href="http://localhost/website/menu.php" class="btn btn-white btn-outline-white">Menu</a></p>
              </div>
            </div>
          </div>
        </div>
 
        <div class="slider-item" style="background-image: url('img/hero_1.jpg');">
          <div class="container">
            <div class="row slider-text align-items-center justify-content-center">
              <div class="col-md-8 text-center col-sm-12 ">
                <h1 data-aos="fade-up mb-5">Enjoy delicious food at BroCode</h1>
                <p data-aos="fade-up" data-aos-delay="200"><a href="http://localhost/website/menu.php" class="btn btn-white btn-outline-white">Menu</a></p>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- END slider -->
    </div> 
    

    <section class="section bg-light py-5  bottom-slant-gray" id="aboutus">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-lg-6">
            <img src="img/hotel.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-5 ml-auto">
            <div class="text-left heading-wrap">
              <h2 data-aos="fade-down">The Restaurant</h2>
            </div>
            <h3 class="mb-4">Welcome To Our Restaurant</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ut enim quam laboriosam illum amet.</p>
            <p>Obcaecati nisi ipsum possimus necessitatibus tempore, illo id facere magni quisquam quam quaerat accusamus dolores?</p>
          </div>
          
        </div>
      </div>
    </section>

    <section class="section  bg-light top-slant-white">
      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row" data-aos="fade">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Blog</h2>
              <span class="back-text">Our Blog</span>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="blog d-block">
              <a class="bg-image d-block" href="single.html" style="background-image: url('img/dishes_1.jpg');"></a>
              <div class="text">
                <h3><a href="single.html">How To Bake A Good Taste Food</a></h3>
                <p class="sched-time">
                  <span> April 22, 2018</span> <br>
                </p>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                
                <p><a href="#" class="btn btn-primary btn-sm">Read More</a></p>
                
              </div>
              
            </div>
          </div>
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="blog d-block">
              <a class="bg-image d-block" href="single.html" style="background-image: url('img/dishes_2.jpg');"></a>
              <div class="text">
                <h3><a href="single.html">How To Bake A Good Taste Food</a></h3>
                <p class="sched-time">
                  <span> April 22, 2018</span> <br>
                </p>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                
                <p><a href="#" class="btn btn-primary btn-sm">Read More</a></p>
                
              </div>
              
            </div>
          </div>
        </div>
      </div>

    </section>

    <footer class="site-footer" role="contentinfo">
      
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4 mb-5">
            <h3>About Us</h3>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus et dolor blanditiis consequuntur ex voluptates perspiciatis omnis unde minima expedita.</p>
            <ul class="list-unstyled footer-link d-flex footer-social">
              <li><a href="#" class="p-2"><span class="fa fa-twitter"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-linkedin"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
            </ul>

          </div>
          <div class="col-md-5 mb-5">
            <div class="mb-5">
              <h3>Opening Hours</h3>
              <p><strong class="d-block font-weight-normal text-black">Sunday-Thursday</strong> 5AM - 10PM</p>
            </div>
            <div>
              <h3>Contact Info</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block">
                  <span class="d-block text-black">Address:</span>
                  <span>34 Street Name, City Name Here, United States</span></li>
                <li class="d-block"><span class="d-block text-black">Phone:</span><span>+1 242 4942 290</span></li>
                <li class="d-block"><span class="d-block text-black">Email:</span><span>info@yourdomain.com</span></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 mb-5">
            <h3>Quick Links</h3>
            <ul class="list-unstyled footer-link">
              <li><a href="#">About</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Disclaimers</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-3">
          
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-md-center text-left">
            
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#cf1d16"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    

    <script src="js/main.js"></script>
    
  </body>
</html>