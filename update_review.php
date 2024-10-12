<?php
include 'connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $review_id = $_POST["review_id"];
    $new_comment = $_POST["new_comment"];

    // Update review in the database
    $sql = "UPDATE reviews SET comment='$new_comment' WHERE id=$review_id";
    if ($connect->query($sql) === TRUE) {
        echo "<script>window.location.href = 'manage_review.php';</script>";
    } else {
        echo "Error updating review: " . $connect->error;
    }
}
?>