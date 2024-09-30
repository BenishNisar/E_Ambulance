<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Rapid Rescue</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/images/Rapid_Rescue.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>
<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  

<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <h2 class="text-center">Frequently Asked Questions</h2>
        <div class="faq">
            <div class="faq-question" onclick="toggleAnswer(this)">
                <h5>What services do you offer?</h5>
            </div>
            <div class="faq-answer">
                <p>We offer a range of rescue services including emergency medical assistance, fire rescue, and disaster response.</p>
            </div>
            <div class="faq-question" onclick="toggleAnswer(this)">
                <h5>How can I contact you in case of an emergency?</h5>
            </div>
            <div class="faq-answer">
                <p>You can contact us by calling our emergency hotline at 123-456-7890.</p>
            </div>
            <div class="faq-question" onclick="toggleAnswer(this)">
                <h5>Are your services available 24/7?</h5>
            </div>
            <div class="faq-answer">
                <p>Yes, we are available 24/7 to assist you in any emergency situation.</p>
            </div>
        </div>
    </div>
</section>
<!-- /FAQ Section -->

<!-- Back to top -->
<div id="back-top" class="back-top"><a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i></a></div>
<!-- /Back to top --> 

<!-- Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer --> 

<!-- Login Form -->
<?php include('includes/login.php');?>
<!-- /Login Form --> 

<!-- Register Form -->
<?php include('includes/registration.php');?>
<!-- /Register Form --> 

<!-- Forgot Password Form -->
<?php include('includes/forgotpassword.php');?>
<!-- /Forgot Password Form -->

<!-- Trigger modal based on session -->
<?php 
if (isset($_SESSION['feedback_success']) && $_SESSION['feedback_success']) {
    echo "<script>
        $(document).ready(function() {
            $('#feedbackModal').modal('show');
        });
    </script>";
    unset($_SESSION['feedback_success']);
}
?>

<script>
function toggleAnswer(element) {
    var answer = element.nextElementSibling;
    if (answer.style.display === "block") {
        answer.style.display = "none";
    } else {
        answer.style.display = "block";
    }
}
</script>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
