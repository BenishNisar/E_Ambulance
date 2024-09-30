<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin']) == 0) {	
    header('location:index.php');
} else {
    // Handle testimonial activation and deactivation
    if (isset($_REQUEST['eid'])) {
        $eid = intval($_GET['eid']);
        $status = "0";
        $sql = "UPDATE tbltestimonial SET status = :status WHERE id = :eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Testimonial Successfully Inactive";
    }

    if (isset($_REQUEST['aeid'])) {
        $aeid = intval($_GET['aeid']);
        $status = 1;
        $sql = "UPDATE tbltestimonial SET status = :status WHERE id = :aeid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Testimonial Successfully Active";
    }

    // Handle testimonial update
    if (isset($_REQUEST['update_id']) && isset($_REQUEST['new_testimonial'])) {
        $update_id = intval($_GET['update_id']);
        $new_testimonial = $_GET['new_testimonial']; // Ensure this comes from a form input
        $sql = "UPDATE tbltestimonial SET Testimonial = :testimonial WHERE id = :id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':testimonial', $new_testimonial, PDO::PARAM_STR);
        $query->bindParam(':id', $update_id, PDO::PARAM_INT);
        $query->execute();
        $msg = "Testimonial updated successfully.";
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
    
    <title>Car Rental Portal | Admin Manage Testimonials</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
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
    <?php include('includes/header.php');?>

    <div class="ts-main-content">
        <?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Manage Testimonials</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">User Testimonials</div>
                            <div class="panel-body">
                                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Testimonials</th>
                                            <th>Posting date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $sql = "SELECT tblusers.FullName, tbltestimonial.UserEmail, tbltestimonial.Testimonial, 
                                    tbltestimonial.PostingDate, tbltestimonial.status, tbltestimonial.id 
                                    FROM tbltestimonial 
                                    JOIN tblusers ON tblusers.Emailid = tbltestimonial.UserEmail 
                                    LIMIT 6"; // Limit to 6 testimonials
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) { ?>	
                                            <tr>
                                                <td><?php echo htmlentities($cnt);?></td>
                                                <td><?php echo htmlentities($result->FullName);?></td>
                                                <td><?php echo htmlentities($result->UserEmail);?></td>
                                                <td><?php echo htmlentities($result->Testimonial);?></td>
                                                <td><?php echo htmlentities($result->PostingDate);?></td>
                                                <td>
                                                    <a href="testimonials.php?update_id=<?php echo htmlentities($result->id); ?>">Edit</a>
                                                    <?php if($result->status == "" || $result->status == 0) { ?>
                                                        <a href="testimonials.php?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Active')">Inactive</a>
                                                    <?php } else { ?>
                                                        <a href="testimonials.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Inactive')">Active</a>
                                                    <?php } ?>
                                                </td>
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

                <?php 
                // Display edit form if an update_id is set
                if (isset($_REQUEST['update_id'])) {
                    $edit_id = intval($_GET['update_id']);
                    $sql = "SELECT * FROM tbltestimonial WHERE id = :id";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':id', $edit_id, PDO::PARAM_INT);
                    $query->execute();
                    $edit_result = $query->fetch(PDO::FETCH_OBJ);
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Edit Testimonial</h3>
                        <form method="POST" action="testimonials.php?update_id=<?php echo htmlentities($edit_result->id); ?>">
                            <div class="form-group">
                                <label for="testimonial">Testimonial:</label>
                                <input type="text" class="form-control" name="new_testimonial" value="<?php echo htmlentities($edit_result->Testimonial); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php } ?>
