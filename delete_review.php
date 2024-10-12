<?php
include 'connect.php';

// Check if review ID is provided in the URL
if (isset($_GET['id'])) {
    $review_id = $_GET['id'];

    // Delete the review from the database
    $sql = "DELETE FROM reviews WHERE id = $review_id";

    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Review deleted successfully!');</script>";
        echo"<script>window.location.href='manage_review.php'</script>";
        exit;
    } else {
        echo "Error deleting review: " . $connect->error;
    }

} else {
    echo "Review ID not provided.";
}
?>