<?php
include 'connect.php';
include 'header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    
    <link rel = "stylesheet" href = "index.css">
    
</head>
<body>



<section class="hero">
    <div class="hero-content">
        <h1>Welcome to SMISH Apartment</h1>
        <p>Spacious Modern Living</p>
        <a href="about_us.php" class="btn">Learn More</a>
    </div>
</section>

<section>

    <h2 style="text-align: center; margin: 50px auto;">Latest Apartments</h2>
    <?php
    $sql = "SELECT * FROM apartment WHERE available = 1 LIMIT 3"; // Limit the query to retrieve only the first three apartments
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $count = 0;
        echo "<div class='container'>"; 
        while ($row = $result->fetch_assoc()) {
            if ($count % 3 == 0 && $count > 0) {
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
            echo "<a href='view_apartment.php?id=" . $row["id"] . "'><button style='background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;'>View</button></a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            $count++;
        }
        echo "</div>"; // End container
    } else {
        echo "<p>No available apartments.</p>";
    }
?>


</section>
<?php
include 'footer.php';?>
</body>
</html>
