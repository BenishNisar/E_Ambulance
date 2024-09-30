<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/config.php');

// Check if user is logged in
if(strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
    exit();
}

if(isset($_GET['del'])) {
    $id = $_GET['del'];
    $sql = "DELETE FROM patients WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    
    $msg = "Patient data deleted successfully";
    header('location:manage_patients.php?msg=' . urlencode($msg)); // Redirect with message
    exit();
}
?>
