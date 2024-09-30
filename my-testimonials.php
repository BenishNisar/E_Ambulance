<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit; // Add exit to stop further script execution
} else {
?>
<!DOCTYPE HTML>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Rapid Rescue</title>
    <style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f9f9f9;
}

.testimonials {
    max-width: 800px;
    margin: auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.testimonial-container {
    display: flex;
    flex-direction: column;
    gap: 15px; /* Space between testimonials */
}

.testimonial-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    background: #f7f7f7;
}

.testimonial-text {
    font-style: italic;
    margin: 0 0 10px;
}

.testimonial-author {
    font-weight: bold;
    margin: 0;
}

.testimonial-date {
    font-size: 0.9em;
    color: #777;
}

    </style>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!--Custom Style -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!--Slick-slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!--Bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="assets/images/Rapid_Rescue.png">
    <!-- Google-Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>
    <?php include('includes/colorswitcher.php'); ?>
    <!-- /Switcher -->  
        
    <!--Header-->
    <?php include('includes/header.php'); ?>
    <section class="testimonials">
        <h2>What Our Customers Say</h2>
        <div class="testimonial-container">
            <div class="testimonial-card">
                <p class="testimonial-text">
                  "This service is amazing! It helped me solve my problems quickly."</p>
                  <img src="images/Benish_Nisar.jpg" alt="benish_nisar" srcset="">
                <h4 class="testimonial-author">Benish Nisar</h4>
                <p class="testimonial-date">Posted on: September 21, 2024</p>
            </div>
            <div class="testimonial-card">
                <p class="testimonial-text">"Highly recommend! Fantastic support and great quality."</p>
                <img src="images/Benish_Nisar.jpg" alt="benish_nisar" srcset="">
                <h4 class="testimonial-author">Benish Nisar</h4>
                <p class="testimonial-date">Posted on: February 15, 2023</p>
            </div>
            <!-- Add more testimonials as needed -->
        </div>
    </section>
    <!--Footer -->
    <?php include('includes/footer.php'); ?>
    <!-- /Footer--> 

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i></a> </div>

    <!-- Scripts --> 
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> 
    <script src="assets/js/interface.js"></script> 
    <!--Switcher-->
    <script src="assets/switcher/js/switcher.js"></script>
    <!--Bootstrap-slider-JS--> 
    <script src="assets/js/bootstrap-slider.min.js"></script> 
    <!--Slider-JS--> 
    <script src="assets/js/slick.min.js"></script> 
    <script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php } ?>
