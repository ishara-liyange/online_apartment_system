<?php include 'connect.php';
include 'header.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel = "stylesheet" href = "view_apartment.css">

</head>

<body>
<?php


    // Check if an apartment ID is provided in the URL
    if (isset($_GET['id'])) {
        $apartment_id = $_GET['id'];

        // Fetch apartment details from the database
        $sql = "SELECT * FROM apartment WHERE id = $apartment_id";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $apartment = $result->fetch_assoc();
            // Display apartment details
            echo "<div class='apartment-details'>";
            echo "<div class='section1'>";
            echo "<img src='" . $apartment["image"] . "' width='200'>";
            echo "</div>";
            echo "<div class='section2'>";
            echo "<h2>" . $apartment["name"] . "</h2>";
            echo "<p>Address: " . $apartment["address"] . "</p>";
            echo "<p>City: " . $apartment["city"] . "</p>";
            echo "<p> $" . $apartment["description"] . "</p>";
            echo "<p> $" . $apartment["price"] . "</p>";
            echo "<div class='buy-back'>";
            echo "<button class='buy-btn'>Contact Us</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

        } else {
            echo "<p>Apartment not found.</p>";
        }
    } else {
        echo "<p>Apartment ID not provided.</p>";
    }
    ?>

</body>
<?php
include 'footer.php';?>

</html>