<?php
include_once 'connect.php';

// Check if the complaint ID is provided in the URL
if (isset($_POST['complaint_id'])) {
    $complaint_id = $_POST['complaint_id'];

    // Check if the reply text is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reply'])) {
        $reply_text = $_POST['reply'];

        // Update the database with the reply
        $query = "UPDATE complaint SET reply = '$reply_text' WHERE id = '$complaint_id'";

        if (mysqli_query($connect, $query)) {
            // If update is successful, redirect back to the manage page
            header("Location: manage_complaint.php");
            exit();
        } else {
            // If update fails, display an error message
            echo "Error updating record: " . mysqli_error($connect);
        }
    }
} else {
    // If complaint ID is not provided in the URL, redirect back to the manage page
    header("Location: manage.php");
    exit();
}

mysqli_close($connect);
?>