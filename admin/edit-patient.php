<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Initialize variables
$error = '';
$msg = '';

// Check if the patient ID is set in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch current patient details
    $sql = "SELECT * FROM patients WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    // Check if the patient exists
    if(!$result) {
        $error = "Patient not found.";
    }

    // Update patient details
    if(isset($_POST['submit'])) {
        // Retrieve form data
        $name = $_POST['name'];
        $mobile_number = $_POST['mobile_number'];
        $medical_history = $_POST['medical_history'];
        $allergies = $_POST['allergies'];
        $emergency_contacts = $_POST['emergency_contacts'];

        // Prepare and execute the update statement
        $sql = "UPDATE patients SET name=:name, mobile_number=:mobile_number, 
                medical_history=:medical_history, allergies=:allergies, 
                emergency_contacts=:emergency_contacts WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name);
        $query->bindParam(':mobile_number', $mobile_number);
        $query->bindParam(':medical_history', $medical_history);
        $query->bindParam(':allergies', $allergies);
        $query->bindParam(':emergency_contacts', $emergency_contacts);
        $query->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the query
        $query->execute();

        // Success message
        $msg = "Patient updated successfully!";
    }
} else {
    header('location:manage-patients.php');
    exit();
}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    
    <title>Edit Patient | Rapid Rescue</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Admin Style -->
    <link rel="stylesheet" href="css/style.css">
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
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Edit Patient</h2>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Patient Details Form</div>
                                    <div class="panel-body">
                                        <?php if($error) { ?>
                                            <div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?></div>
                                        <?php } else if($msg) { ?>
                                            <div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?></div>
                                        <?php } ?>
                                        <form method="post" name="patientForm" class="form-horizontal">
                                            <!-- Patient Name -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Full Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlentities($result->name); ?>" required>
                                                </div>
                                            </div>

                                            <!-- Mobile Number -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Mobile Number</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="<?php echo htmlentities($result->mobile_number); ?>" required>
                                                </div>
                                            </div>

                                            <!-- Medical History -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Medical History</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="medical_history" id="medical_history" rows="4"><?php echo htmlentities($result->medical_history); ?></textarea>
                                                </div>
                                            </div>

                                            <!-- Allergies -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Allergies</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="allergies" id="allergies" rows="4"><?php echo htmlentities($result->allergies); ?></textarea>
                                                </div>
                                            </div>

                                            <!-- Emergency Contacts -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Emergency Contacts</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="emergency_contacts" id="emergency_contacts" value="<?php echo htmlentities($result->emergency_contacts); ?>" required>
                                                </div>
                                            </div>

                                            <div class="hr-dashed"></div>

                                            <!-- Submit Button -->
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-4">
                                                    <button class="btn btn-primary" name="submit" type="submit">Update</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
