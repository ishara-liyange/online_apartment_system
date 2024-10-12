<?php
include 'connect.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

// Check if apartment ID is provided in the URL
if (!isset($_GET['id'])) {
    echo "Apartment ID not provided.";
    exit;
}

$apartment_id = $_GET['id'];
$user_id = $_SESSION['user']['id'];

// Delete apartment from the database
$sql = "DELETE FROM apartment WHERE id = $apartment_id AND userid = $user_id";
if ($connect->query($sql) === TRUE) {
    echo "<script>alert('Apartment deleted successfully!');</script>";
    echo"<script>window.location.href='seller_apartments.php'</script>";
    exit;
} else {
    echo "Error deleting apartment: " . $connect->error;
}
?>