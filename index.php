<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">

  <title>OSMS</title>

  <style type="text/css">
    .desc{
      color: white;
       position: fixed;
       top: 235px;
       left: 560px;
    }
  </style>
</head>

<body>
  <!-- Start Navigation -->
  <nav  class="navbar navbar-expand-sm navbar-dark fixed-top bg-secondary">
    <a href="index.php" class="navbar-brand"><img src="images/logo.png"></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse"  id="myMenu" >
      <ul class="navbar-nav custom-nav ml-auto" >
        <li class="nav-item ml-4"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item ml-4"><a href="#about_us" class="nav-link">About us</a></li>
        <li class="nav-item ml-4"><a href="#services" class="nav-link">Services</a></li>
        <li class="nav-item ml-4"><a href="#customer" class="nav-link">Gallery</a></li>

        <li class="nav-item ml-4"><a href="#contact" class="nav-link">Contact</a></li>
        
        <li class="nav-item ml-4"><a href="user/userregistration.php" class="nav-link">Registration</a></li>
        <li class="nav-item ml-4"><a href="user/userlogin.php" class="nav-link">Login</a></li>
        
      </ul>
    </div>
  </nav> <!-- End Navigation -->

  <!-- Start Header Jumbotron-->
 
    <header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/slide1.jpg" alt="First slide">

      <div class="carousel-caption d-none d-md-block">
    <a href="index.php"><p class="desc" style=" font-size: 80px;">Home</p></a>
    <h5>This is home page</h5>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
    </div>
    </div>

    <div class="carousel-item">
      <img class="d-block w-100" src="images/slide2.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <a href="#Contact"><p class="desc" style=" font-size: 80px;">Contact</p></a>
    <h5>This is contact page</h5>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
    </div>
    </div>

    <div class="carousel-item">
      <img class="d-block w-100" src="images/slide3.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <a href="#Services"><p class="desc" style=" font-size: 80px;">Services</p></a>
    <h5>This is services page</h5>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
    </div>
    </div>

    <div class="carousel-item">
      <img class="d-block w-100" src="images/slide4.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
    <a href="user/userregistration.php"><p class="desc" style=" font-size: 80px;">Register</p></a>
    <h5>This is register page</h5>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
    </div>
    </div>

    <div class="carousel-item">
      <img class="d-block w-100" src="images/slide5.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <a href="user/userlogin.php"><p class="desc" style=" font-size: 80px;">Login</p></a>
    <h5>This is login page</h5>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
    </div>
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  </header> <!-- End Header Jumbotron -->

  <div class="container" id="about_us">
    <!--Introduction Section-->
    <div class="jumbotron">
      <h3 class="text-center">About Us</h3>
      <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
      </p>

    </div>
  </div>
  <!--Introduction Section End-->
  <!-- Start Services -->
  <div class="container text-center border-bottom" id="services">
    <h2>Our Services</h2>
    <div class="row mt-4">
      <div class="col-sm-3 mb-4">
        <a href="#"><i class="fas fa-cogs fa-8x text-secondary"></i></a>
        <h4 class="mt-4">Fault Maintinance</h4>
      </div>
      <div class="col-sm-3 mb-4">
        <a href="#"><i class="fas fa-mobile fa-8x text-secondary"></i></a>
        <h4 class="mt-4">Software Mantinance</h4>
      </div><div class="col-sm-3 mb-4">
        <a href="#"><i class="fas fa-laptop fa-8x text-secondary"></i></a>
        <h4 class="mt-4">Software Mantinance</h4>
      </div>
      <div class="col-sm-3 mb-4">
        <a href="#"><i class="fas fa-sliders-h fa-8x text-secondary"></i></a>
        <h4 class="mt-4">Preventive Maintenance</h4>
      </div>
      
    </div>
  </div> <!-- End Services -->

  <!-- Start Happy Customer  -->
  <div style="background: #bdbdbd ;" class="jumbotron" id="customer">
    <!-- Start Happy Customer Jumbotron -->
    <div class="container">
      <!-- Start Customer Container -->
      <h2 class="text-center text-black">Our Customers</h2>
      <div class="row mt-5">
        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 1st Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/1.jpg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Rohit Kumar</h4>
              <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
          </div>
        </div> <!-- End Customer 1st Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 2nd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/2.jpg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Pooja Yadav</h4>
              <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
          </div>
        </div> <!-- End Customer 2nd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 3rd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/3.jpg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Ritika Yadav</h4>
              <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
          </div>
        </div> <!-- End Customer 3rd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 4th Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/4.jpg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Manoj Sinha</h4>
              <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
          </div>
        </div> <!-- End Customer 4th Column-->
      </div> <!-- End Customer Row-->
    </div> <!-- End Customer Container -->
  </div> <!-- End Customer Jumbotron -->

  <!--Start Contact Us-->
  <div class="container" id="contact">
    <!--Start Contact Us Container-->
    <h2 class="text-center mb-4">Contact Us</h2> <!-- Contact Us Heading -->
    <div class="row">

      <!--Start Contact Us Row-->
      <?php include('contactform.php'); ?>
      <!-- End Contact Us 1st Column -->

      <div class="col-sm-4 text-center">
        <!-- Start Contact Us 2nd Column-->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.8316138986465!2d77.3535236144058!3d28.57481869344297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5961f589b79%3A0x830d4e4085f76372!2sNoida%20City%20Center%20Metro%20Parking!5e0!3m2!1sen!2sin!4v1621920293089!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div> <!-- End Contact Us 2nd Column-->
    </div> <!-- End Contact Us Row-->
  </div> <!-- End Contact Us Container-->
  <!-- End Contact Us -->

  <!-- Start Footer-->
   
<footer style="color: white; text-decoration: none;" class="footer bg-dark">
<div class="container">
<div class="row">
<div class=" col-sm-3">
<h4 style="color: white;" class="mt-4 mb-3">Find us</h4>
<!--headin5_amrc-->
<p class="mb10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
<p><i class="fa fa-location-arrow"></i>Sector-41, Noida, Uttar Pradesh  </p>
<p><i class="fa fa-phone"></i> <a href="tel:+91-7982600726" class="color"> +91-7982600726</a><br>&nbsp;&nbsp;&nbsp;&nbsp; 
  <a href="tel:+91-9616255454" class="color">+91-9616255454</a></p>
<p><i class="fa fa-envelope"> </i><a href="mailto:raviyadav2017sln@gmail.com" class="color"> raviyadav2017sln@gmail.com </a> </p>
</div>

<div class=" col-sm-3">
<h4 style="color: white; margin-left: 38px; " class="mt-4 mb-3">Quick links</h4>
<!--headin5_amrc-->
<ul style=" list-style-type:none; " class="">
<li><a class="color" href="">Image Rectoucing</a></li>
<li><a class="color" href="">Clipping Path</a></li>
<li><a class="color" href="">Hollow Man Montage</a></li>
<li><a class="color" href="">Ebay & Amazon</a></li>
<li><a class="color" href="">Hair Masking/Clipping</a></li>
<li><a class="color" href="">Image Cropping</a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>


<div class=" col-sm-3">
<h4 style="color: white;margin-left: 38px;" class="mt-4 mb-3">Quick links</h4>
<!--headin5_amrc-->
<ul style="list-style-type: none; " class="">
<li><a class="color" href="">Remove Background</a></li>
<li><a class="color" href="">Shadows & Mirror Reflection</a></li>
<li><a class="color" href="">Logo Design</a></li>
<li><a class="color" href="">Vectorization</a></li>
<li><a class="color" href="">Hair Masking/Clipping</a></li>
<li><a class="color" href="">Image Cropping</a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>

<div class=" col-sm-3">
<h4 style="color: white;margin-left: 38px;" class="mt-4 mb-3">Follow us</h4>
<!--headin5_amrc ends here-->

<ul style=" list-style-type:none;" class="">
<li><a href="#"><i class="fab fa-twitter float-left mr-3 color"></i> </a><p><a class="color" href="https://www.twitter.com/" target="_blank">www.twitter.com</a></p></li>
<li><a href="#"><i class="fab fa-facebook-f float-left mr-3 color"></i> </a><p><a class="color" href="https://www.facebook.com/" target="_blank">www.facebook.com</a></p></li>
<li><a href="#"><i class="fab fa-instagram float-left mr-3 color"></i> </a><p><a class="color" href="https://www.instagram.com/" target="_blank">www.instagra.com</a></p></li>
<li><a href="#"><i class="fab fa-linkedin float-left mr-3 color"></i> </a><p><a class="color" href="https://www.linkdin.com/" target="_blank">www.linkdin.com</a></p></li>
</ul>
<!--footer_ul2_amrc ends here-->
</div>
</div>
</div>


<div class="container">
<ul class="footer_menu">
<li><a href="index.php">Home</a></li>
<li><a href="#about_us">About us</a></li>
<li><a href="#services">Services</a></li>
<li><a href="#customer">Gallery</a></li>
<li><a href="#contact">Contact</a></li>
<li><a href="user/userregistration.php">Registration</a></li>
<li><a href="user/userLogin.php">Login</a></li>
</ul>
<!--foote_bottom_ul_amrc ends here-->
<p class="text-center">Copyright @2021 | Designed by Ravi Yadav 

<ul class="social_footer_ul">
<li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
<li><a href="https://www.linkdin.com/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
<li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
</ul>
<!--social_footer_ul ends here-->
</div>

</footer>
  <!-- End Footer -->

  <!-- Boostrap JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
</body>

</html>