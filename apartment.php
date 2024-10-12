<?php
include 'connect.php';
include 'header.php';

// Fetch available apartments from the database
$sql = "SELECT * FROM apartment WHERE available = 1";
$result = $connect->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Apartments</title>
    
    <link rel = "stylesheet" href = "apartment.css">
</head>

<body>
    <h2 style="text-align: center;">Available Apartments</h2>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            $count = 0;
            while ($row = $result->fetch_assoc()) {
                if ($count % 3 == 0 && $count > 0) {
                    // Start a new row after every 3 apartments
                    echo "</div><div class='container'>";
                }
                echo "<div class='apartment-card'>";
                echo "<img src='" . $row["image"] . "' class='apartment-image'>";
                echo "<div class='apartment-detail'>";
                echo "<p class='apartment-title'>" . $row["name"] . "</p>";
                echo "<p class='apartment-description'>Address: " . $row["address"] . "</p>";
                echo "<p class='apartment-description'>City: " . $row["city"] . "</p>";
                echo "<p class='apartment-price'>Price: $" . $row["price"] . "</p>";
                echo "<div class='view-btn'>";
                echo "<a href='view_apartment.php?id=" . $row["id"] . "'><button style='background-color: #5E5847; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;'>View</button></a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                $count++;
            }
        } else {
            echo "<p>No available apartments.</p>";
        }
        ?>
    </div>
</body>
<?php
include 'footer.php';?>

</html>
