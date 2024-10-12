<?php
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user ID from the form
    $user_id = $_POST["user_id"];

    // Delete the user account from the database
    $sql = "DELETE FROM users WHERE id = $user_id";

    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('User deleted successfully!');</script>";
        echo "<script>window.location.href = 'signup.php';</script>";
        // Delete the user's session
        session_destroy();

        exit;
    } else {
        // If there was an error, display an error message
        echo "Error deleting user account: " . $connect->error;
    }
} else {
    // If the request method is not POST, redirect to an error page
    header("Location: error.php");
    exit;
}
?>