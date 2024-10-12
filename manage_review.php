<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Dashboard</title>
    <link rel="stylesheet" href="manage_review.css">
    
</head>

<body>
    

    <?php
    include 'sideBarAd.php';
    include 'connect.php';
    ?>

<div class="main-content">

    <h2 style="text-align: center; margin: 20px auto; font-size:30px">Review Dashboard</h2>
    <div class="container">
    <?php

    // Fetch reviews from the database
    $sql = "SELECT * FROM reviews";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // Display reviews in a table
        echo "<table>";
        echo "<tr><th>User</th><th>Email</th><th>Comment</th><th>Actions</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["user_name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["comment"] . "</td>";
            echo "<td><a href='edit_review.php?id=" . $row["id"] . "'><button class='edit-button'>Edit</button></a> | <a href='delete_review.php?id=" . $row["id"] . "'><button class='delete-button'>Delete</button></a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No reviews found.</p>";
    }
    ?>

</div>

</div>
</body>

</html>