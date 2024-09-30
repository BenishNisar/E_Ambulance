<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Handle deletion
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $sql = "DELETE FROM drivers WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
    $msg = "Driver deleted successfully!";
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

    <title>Rapid Rescue - Manage Drivers</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Admin Style -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Manage Drivers</h2>

                        <?php if($msg): ?>
                            <div class="succWrap">
                                <strong>Success:</strong> <?php echo htmlentities($msg); ?>
                            </div>
                        <?php endif; ?>

                        <div class="panel panel-default">
                            <div class="panel-heading">Listed Drivers</div>
                            <div class="panel-body">
                                <table id="driverTable" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>License Number</th>
                                            <th>Contact Number</th>
                                            <th>Status</th>
                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT * FROM drivers";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;

                                        if($query->rowCount() > 0) {
                                            foreach($results as $result) { ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->name); ?></td>
                                                    <td><?php echo htmlentities($result->license_number); ?></td>
                                                    <td><?php echo htmlentities($result->contact_number); ?></td>
                                                    <td><?php echo htmlentities($result->status); ?></td>
                                                 
                                                </tr>
                                            <?php 
                                            $cnt++; 
                                            }
                                        } ?>
                                    </tbody>
                                </table>
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
