<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
    <link rel="stylesheet" href="inbox.css">
    
</head>

<body>

    <div class="inbox-container">
        <?php


        include 'connect.php';


        if (!isset($_SESSION['user'])) {

            header("Location: login.php");
            exit();
        } else {
            echo "<h2>Welcome " . $_SESSION['user']['name'] . "</h2>";


            $user_id = $_SESSION['user']['id'];


            $query = "SELECT * FROM complaint WHERE u_id = '$user_id'";
            $result = mysqli_query($connect, $query);


            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='complaint'>";
                   
                    echo "<p>Complaint: " . $row['complaint'] . "</p>";
                    if (!empty($row['reply'])) {
                        echo "<p class='reply'>Reply: " . $row['reply'] . "</p>";
                    } else {
                        echo "<p class='reply'>No reply</p>";
                    }
                    echo "</div>";
                }
            } else {

                echo "<p>No complaints found for this user.</p>";
            }


            mysqli_close($connect);
        }
        ?>
    </div>
</body>

</html>