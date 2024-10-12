<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
        
    <link rel = "stylesheet" href = "review.css">

<body>

    <?php
    include 'connect.php';
    include 'header.php';
?>
<div class="review-container">
<h2>Reviews</h2>
</div>

<?php
    // Fetch reviews from the database
    $sql = "SELECT * FROM reviews";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // Output reviews if there are any
        echo "<div class='review-row'>";
        $count = 0;
        while ($row = $result->fetch_assoc()) {
            echo "<div class='review-card'>";
            echo "<img src='profile_img/" . $row["user_image"] . "' alt='User Image' width='50px'>";
            echo "<p>" . $row["comment"] . "</p>";
            echo "<p style='color: gray;'> " . $row["user_name"] . "</p>";
            
            
            echo "</div>";

            $count++;
            // If four reviews are displayed, start a new row
            if ($count % 4 == 0) {
                echo "</div><div class='review-row'>";
            }
        }
        echo "</div>"; // Close the last row
    } else {
        // Output a message if there are no reviews
        echo "<p>No reviews found.</p>";
    }
    ?>

    <div class="review-container">
    <button class="review-btn" onclick="window.location.href='add_review.php'">Give Us Reviews</button>
    </div>

</body>
<?php
include 'footer.php';?>

</html>
