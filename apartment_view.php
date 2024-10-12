<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment List</title>
    <link rel="stylesheet" href="apartment_view.css">
</head>

<body>

    <?php
    include 'sideBarAd.php'; ?>
    <div class="main-content">
        <h2 style="text-align: center; margin: 20px auto; font-size: 30px;">Manage Apartments</h2>
        <div class="container">
    <?php
    // Include database connection
    include 'connect.php';

    // Fetch apartment data from database
    $sql = "SELECT * FROM apartment";
    $result = $connect->query($sql);

  
if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Name</th><th>Address</th><th>City</th><th>Price</th><th>Status</th></tr>';
    
    // Output data of each apartment
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["address"] . '</td>';
        echo '<td>' . $row["city"] . '</td>';
        echo '<td>$' . number_format($row["price"], 2) . '</td>';
        echo '<td>' . ($row["available"] ? 'Available' : 'Not Available') . '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
} else {
    echo "No apartments found.";
}



    $connect->close();
    ?>

</div>
</div>
</body>
<?php
?>

</html>