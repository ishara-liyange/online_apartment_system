<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user manage </title>
    <link rel="stylesheet" href="user_manage.css">

</head>

<body>
    <?php
    include 'sideBarAd.php'; ?>
    <div class="main-content">
        <h2 style="text-align: center; margin: 20px auto; font-size:30px">Manage Users</h2>
        <div class="container">
    <?php

    include 'connect.php';
    $sql = "SELECT * FROM users";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // Display users in a table
        echo "<table >";
        echo "<tr><th>name</th><th>email</th><th>phone</th><th>nic</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["nic"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No users found.";
    }

    // Close the database connection
    $connect->close();

    ?>
</div>
</div>

</body>

</html>