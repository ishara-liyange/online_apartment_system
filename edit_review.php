<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>
    <link rel="stylesheet" href="edit_review.css">
</head>

<body>
    

    <?php
    include 'sideBarAd.php';
    include 'connect.php';
    ?>
        <div class="main-content">
        <h2 style="text-align: center; margin: 20px auto;font-size:30px;">Edit Review</h2>
        <div class="container">
            
    <?php

    // Check if review ID is provided in the URL
    if (!isset($_GET['id'])) {
        echo "Review ID not provided.";
        exit;
    }

    $review_id = $_GET['id'];

    // Fetch review details based on the ID
    $sql = "SELECT * FROM reviews WHERE id = $review_id";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display the review details in a form
        ?>
        <form method="POST" action="update_review.php">
            <input type="hidden" name="review_id" value="<?php echo $row['id']; ?>">
            <textarea name="new_comment" required><?php echo $row['comment']; ?></textarea><br>
            <button type="submit" name = "submit">Update Review</button>
        </form>
        <?php

    } else {
        echo "Review not found.";
    }
    ?>
</div>
</div>
</body>

</html>