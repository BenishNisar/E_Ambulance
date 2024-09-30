<?php
session_start();
error_reporting(0);
include('includes/config.php');


// Handle ambulance form submission
if (isset($_POST['submit'])) {
    // Retrieve form data
    $ambulance_number = $_POST['ambulance_number'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $location = $_POST['location'];
    $driver = $_POST['driver'];

    // Prepare and execute the insert statement
    $sql = "INSERT INTO ambulances (ambulance_number, type, status, location, driver) 
            VALUES (:ambulance_number, :type, :status, :location, :driver)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':ambulance_number', $ambulance_number);
    $query->bindParam(':type', $type);
    $query->bindParam(':status', $status);
    $query->bindParam(':location', $location);
    $query->bindParam(':driver', $driver);

    // Execute the query
    $query->execute();

    // Success message
    $msg = "Ambulance added successfully!";
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

    <title>Rapid Rescue - Add Ambulance</title>

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
                        <h2 class="page-title">Add Ambulance</h2>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Ambulance Details Form</div>
                                    <div class="panel-body">
                                        <form method="post" name="ambulanceForm" class="form-horizontal">
                                            <!-- Ambulance Number -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Ambulance Number</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="ambulance_number" id="ambulance_number" required>
                                                </div>
                                            </div>

                                            <!-- Type -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Type</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="type" id="type" required>
                                                </div>
                                            </div>

                                            <!-- Status -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Status</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="status" id="status" required>
                                                        <option value="Available">Available</option>
                                                        <option value="Unavailable">Unavailable</option>
                                                        <option value="En Route">En Route</option>
                                                        <option value="On Scene">On Scene</option>
                                                        <option value="Transporting">Transporting</option>
                                                        <option value="Back to Base">Back to Base</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Location -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Location</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="location" id="location" required>
                                                </div>
                                            </div>

                                            <!-- Driver -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Driver</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="driver" id="driver" required>
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
