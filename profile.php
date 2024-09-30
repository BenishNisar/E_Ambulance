<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['updateprofile'])) {
        $name = htmlspecialchars(trim($_POST['fullname']));
        $mobileno = htmlspecialchars(trim($_POST['mobilenumber']));
        $dob = htmlspecialchars(trim($_POST['dob']));
        $adress = htmlspecialchars(trim($_POST['address']));
        $city = htmlspecialchars(trim($_POST['city']));
        $country = htmlspecialchars(trim($_POST['country']));
        $email = $_SESSION['login'];

        try {
            $sql = "UPDATE tblusers SET FullName=:name, ContactNo=:mobileno, dob=:dob, Address=:adress, City=:city, Country=:country WHERE EmailId=:email";
            $query = $dbh->prepare($sql);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
            $query->bindParam(':dob', $dob, PDO::PARAM_STR);
            $query->bindParam(':adress', $adress, PDO::PARAM_STR);
            $query->bindParam(':city', $city, PDO::PARAM_STR);
            $query->bindParam(':country', $country, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $msg = "Profile Updated Successfully";
        } catch (Exception $e) {
            $error = "Error: " . $e->getMessage();
        }
    }

    $useremail = $_SESSION['login'];
    $sql = "SELECT * FROM tblusers WHERE EmailId=:useremail";
    $query = $dbh->prepare($sql);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ); // Only fetch one result
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rapid Rescue</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/Rapid_Rescue.png">
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
        }
    </style>
</head>
<body>

<!--Header-->
<?php include('includes/header.php'); ?>
<!-- /Header -->

<!--Page Header-->
<!-- Sidebar -->


<!-- User Profile Section -->
<section class="user_profile inner_pages">
    <div class="container">
        <div class="user_profile_info gray-bg padding_4x4_40">
            <div class="upload_user_logo"><img src="assets/images/profile_girl.jpg" alt="image"></div>
            <div class="dealer_info">
                <h5><?php echo htmlentities($result->FullName); ?></h5>
                <p><?php echo htmlentities($result->Address); ?><br>
                    <?php echo htmlentities($result->City); ?>&nbsp;<?php echo htmlentities($result->Country); ?></p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <?php include('includes/sidebar.php'); ?>
            </div>
            <div class="col-md-6 col-sm-8">
                <div class="profile_wrap">
                    <h5 class="uppercase underline">General Settings</h5>
                    <?php if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?></div><?php } ?>
                    <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?></div><?php } ?>

                    <!-- Profile Update Form -->
                    <form method="post">
                        <div class="form-group">
                            <label class="control-label">Reg Date -</label>
                            <?php echo htmlentities($result->RegDate); ?>
                        </div>
                        <?php if ($result->UpdationDate != "") { ?>
                            <div class="form-group">
                                <label class="control-label">Last Update at -</label>
                                <?php echo htmlentities($result->UpdationDate); ?>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="control-label">Full Name</label>
                            <input class="form-control white_bg" name="fullname" value="<?php echo htmlentities($result->FullName); ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email Address</label>
                            <input class="form-control white_bg" value="<?php echo htmlentities($result->EmailId); ?>" name="emailid" type="email" required readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phone Number</label>
                            <input class="form-control white_bg" name="mobilenumber" value="<?php echo htmlentities($result->ContactNo); ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Date of Birth (dd/mm/yyyy)</label>
                            <input type="date" class="form-control white_bg" name="dob" value="<?php echo htmlentities($result->dob); ?>" placeholder="dd/mm/yyyy" type="text">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Your Address</label>
                            <textarea class="form-control white_bg" name="address" rows="4"><?php echo htmlentities($result->Address); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Country</label>
                            <input class="form-control white_bg" name="country" value="<?php echo htmlentities($result->Country); ?>" type="text">
                        </div>
                        <div class="form-group">
                            <label class="control-label">City</label>
                            <input class="form-control white_bg" name="city" value="<?php echo htmlentities($result->City); ?>" type="text">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                        </div>
                    </form>
                    <!-- /Profile Update Form -->
                </div>
            </div>
        </div>
    </div>
</section>

<!--Footer -->
<?php include('includes/footer.php'); ?>
<!-- /Footer -->

<!--Back to top-->
<div id="back-top" class="back-top"><a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i></a></div>
<!--/Back to top-->

<!--Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script>
</body>
</html>
<?php } ?>
