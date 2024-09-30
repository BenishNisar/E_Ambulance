<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/config.php');

$showModal = false; // Flag to show the modal

if (isset($_POST['submit'])) {
    // Retrieve and sanitize form inputs
    $name = htmlspecialchars($_POST['name']);
    $mobile_number = htmlspecialchars($_POST['mobile_number']);
    $medical_history = htmlspecialchars($_POST['medical_history']);
    $allergies = htmlspecialchars($_POST['allergies']);
    $emergency_contacts = htmlspecialchars($_POST['emergency_contacts']);
    
    try {
        // Insert data into the patients table
        $sql = "INSERT INTO patients (name, mobile_number, medical_history, allergies, emergency_contacts) VALUES (:name, :mobile_number, :medical_history, :allergies, :emergency_contacts)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':mobile_number', $mobile_number, PDO::PARAM_STR);
        $query->bindParam(':medical_history', $medical_history, PDO::PARAM_STR);
        $query->bindParam(':allergies', $allergies, PDO::PARAM_STR);
        $query->bindParam(':emergency_contacts', $emergency_contacts, PDO::PARAM_STR);
        $query->execute();

        $showModal = true; // Flag to show the modal
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Head Content -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/Rapid_Rescue.png">
    <title>Rapid Rescue - Patient Data</title>
</head>
<body>

<!-- Header -->
<?php include('includes/header.php');?>

<!-- Page Header -->
<section class="page-header" >
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1>Patient Data</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Patient Data</li>
            </ul>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

<!-- Patient Data Form -->
<section class="contact_us section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Enter Patient Information</h3>
                <?php if (isset($error)) { ?>
                    <div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div>
                <?php } ?>

                <div class="contact_form">
                    <form method="post" name="patientForm">
                        <!-- Patient Name -->
                        <div class="form-group">
                            <label>Full Name<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>

                        <div class="form-group">
                            <label>Mobile Number<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="mobile_number" id="mobile_number" required>
                        </div>

                        <div class="form-group">
                            <label>Medical History</label>
                            <textarea class="form-control" name="medical_history" id="medical_history" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Allergies</label>
                            <textarea class="form-control" name="allergies" id="allergies" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Emergency Contacts<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="emergency_contacts" id="emergency_contacts" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Thank You Modal -->
<div class="modal fade" id="thankYouModal" tabindex="-1" role="dialog" aria-labelledby="thankYouModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="thankYouModalLabel">Thank You!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center;"> <!-- Center text -->
                <img src="images/Ambulance_indes.gif" alt="image" style="width: 300px; display: block; margin: 0 auto 15px auto;"> <!-- Center image -->
                <p  style="margin: 0;color:green;">Thank you for this information!</p> <!-- Center text -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include('includes/footer.php'); ?>
<div id="back-top" class="back-top"><a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i></a></div>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 

<script>
    $(document).ready(function() {
        <?php if ($showModal): ?>
            $('#thankYouModal').modal('show');
        <?php endif; ?>
    });
</script>
</body>
</html>
