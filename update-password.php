<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {
        $password = md5($_POST['password']);
        $newpassword = md5($_POST['newpassword']);
        $email = $_SESSION['login'];
        
        // Check current password
        $sql = "SELECT Password FROM tblusers WHERE EmailId = :email AND Password = :password";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            // Update password
            $con = "UPDATE tblusers SET Password = :newpassword WHERE EmailId = :email";
            $chngpwd1 = $dbh->prepare($con);
            $chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
            $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
            $chngpwd1->execute();
            $msg = "Your password has been successfully changed";
        } else {
            $error = "Your current password is incorrect";  
        }
    }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rapid Rescue</title>
    <link rel="shortcut icon" href="assets/images/Rapid_Rescue.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" rel="stylesheet">
    
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>
    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                alert("New Password and Confirm Password do not match!");
                document.chngpwd.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <!-- Header -->
    <?php include('includes/header.php'); ?>
    
    <!-- Page Header -->
    <?php 
$useremail = $_SESSION['login'];
$sql = "SELECT * FROM tblusers WHERE EmailId = :useremail";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ); // Fetching a single record

if ($result) { ?>
    <section class="user_profile inner_pages">
        <div class="container">
            <div class="user_profile_info gray-bg padding_4x4_40">
                <div class="upload_user_logo">
                    <img src="assets/images/profile_girl.jpg" alt="image">
                </div>
                <div class="dealer_info">
                    <h5><?php echo htmlentities($result->FullName); ?></h5>
                    <p><?php echo htmlentities($result->Address); ?><br>
                    <?php echo htmlentities($result->City); ?>, <?php echo htmlentities($result->Country); ?></p>
                </div>
            </div>
            <div class="row">
               
            <section class="user_profile inner_pages">
    <div class="container">
        <div class="row justify-content-center" style="width:100%;margin-top:-150px;"> <!-- Centering the row -->
            <div class="col-md-6 col-sm-8">
                <div class="profile_wrap">
                    <form name="chngpwd" method="post" onSubmit="return valid();">
                        <div class="gray-bg field-title">
                            <h6>Update Password</h6>
                        </div>
                        <?php if ($error) { ?>
                            <div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?></div>
                        <?php } else if ($msg) { ?>
                            <div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?></div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="control-label">Current Password</label>
                            <input class="form-control white_bg" id="password" name="password" type="password" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">New Password</label>
                            <input class="form-control white_bg" id="newpassword" type="password" name="newpassword" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Confirm Password</label>
                            <input class="form-control white_bg" id="confirmpassword" type="password" name="confirmpassword" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" name="update" id="submit" class="btn btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



            </div>
        </div>
    </section>
<?php 
}

include('includes/footer.php');?>

    
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> 
    <script src="assets/js/interface.js"></script> 
</body>
</html>
<?php 
} 
?>
