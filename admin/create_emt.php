<?php
session_start();
error_reporting(0);
include('includes/config.php'); // Database connection

// EMT form submit handle karna
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $license_number = $_POST['license_number'];
    $contact_number = $_POST['contact_number'];
    $status = $_POST['status'];

    // EMT data insert karne ki query
    $sql = "INSERT INTO emts (name, license_number, contact_number, status) 
            VALUES (:name, :license_number, :contact_number, :status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name);
    $query->bindParam(':license_number', $license_number);
    $query->bindParam(':contact_number', $contact_number);
    $query->bindParam(':status', $status);

    // Query execute karna aur success/error message display karna
    if ($query->execute()) {
        $msg = "EMT added successfully!";
    } else {
        $error = "Error adding EMT.";
    }
}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Add EMT</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                        <h2 class="page-title">Add EMT</h2>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading">EMT Details Form</div>
                                    <div class="panel-body">
                                        <form method="post" name="emtForm" class="form-horizontal">
                                            <!-- EMT Name -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">EMT Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name" required>
                                                </div>
                                            </div>

                                            <!-- License Number -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">License Number</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="license_number" required>
                                                </div>
                                            </div>

                                            <!-- Contact Number -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Contact Number</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="contact_number" required>
                                                </div>
                                            </div>

                                            <!-- Status -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Status</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="status" required>
                                                        <option value="Available">Available</option>
                                                        <option value="Unavailable">Unavailable</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="hr-dashed"></div>

                                            <!-- Submit Button -->
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-4">
                                                    <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php if (isset($msg)) { echo "<div class='alert alert-success'>$msg</div>"; } ?>
                                        <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
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
