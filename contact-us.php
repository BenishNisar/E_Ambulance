<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (isset($_POST['send'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $message = $_POST['message'];
    
    $sql = "INSERT INTO tblcontactusquery(name, EmailId, ContactNumber, Message) 
            VALUES (:name, :email, :contactno, :message)";
    
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);
    
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    
    if ($lastInsertId) {
        $msg = "We will contact you shortly.";
    } else {
        $error = "Something went wrong. Please try again.";
    }
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
    <title>Rapid Rescue</title>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- OWL Carousel slider -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!-- Slick slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Bootstrap slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!-- FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" href="assets/switcher/css/switcher.css" media="all">
    <link rel="alternate stylesheet" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true">
    <link rel="alternate stylesheet" href="assets/switcher/css/orange.css" title="orange" media="all">
    <link rel="alternate stylesheet" href="assets/switcher/css/blue.css" title="blue" media="all">
    <link rel="alternate stylesheet" href="assets/switcher/css/pink.css" title="pink" media="all">
    <link rel="alternate stylesheet" href="assets/switcher/css/green.css" title="green" media="all">
    <link rel="alternate stylesheet" href="assets/switcher/css/purple.css" title="purple" media="all">
    
    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/images/Rapid_Rescue.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php'); ?>
<!-- /Switcher -->

<!--Header-->
<?php include('includes/header.php'); ?>
<!-- /Header -->

<!--Page Header-->
<section class="page-header contactus_page">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1>Contact Us</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
    <!-- Dark Overlay -->
    <div class="dark-overlay"></div>
</section>
<!-- /Page Header -->

<!--Contact-us-->
<section class="contact_us section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Get in touch using the form below</h3>
                <?php if ($error) { ?>
                    <div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div>
                <?php } else if ($msg) { ?>
                    <div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div>
                <?php } ?>
                
                <div class="contact_form gray-bg">
                    <h1>Patient</h1>
                    <form method="post">
                        <div class="form-group">
                            <label class="control-label">Full Name <span>*</span></label>
                            <input type="text" name="fullname" class="form-control white_bg" id="fullname" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email Address <span>*</span></label>
                            <input type="email" name="email" class="form-control white_bg" id="emailaddress" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phone Number <span>*</span></label>
                            <input type="text" name="contactno" class="form-control white_bg" id="phonenumber" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Message <span>*</span></label>
                            <textarea class="form-control white_bg" name="message" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn" type="submit" name="send">Send Message <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Contact Info</h3>
                <div class="contact_detail">
                    <?php
                    $sql = "SELECT Address, EmailId, ContactNo FROM tblcontactusinfo";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) { ?>
                            <ul>
                                <li>
                                    <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                    <div class="contact_info_m"><?php echo htmlentities($result->Address); ?></div>
                                </li>
                                <li>
                                    <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                    <div class="contact_info_m"><a href="mailto:<?php echo htmlentities($result->EmailId); ?>"><?php echo htmlentities($result->EmailId); ?></a></div>
                                </li>
                                <li>
                                    <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                    <div class="contact_info_m"><a href="tel:<?php echo htmlentities($result->ContactNo); ?>"><?php echo htmlentities($result->ContactNo); ?></a></div>
                                </li>
                            </ul>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Contact-us -->

<!-- Footer -->
<?php include('includes/footer.php'); ?>
<!-- /Footer -->

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
