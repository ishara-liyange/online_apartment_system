<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply Complaints</title>
    <link rel="stylesheet" href="reply_complaint.css">
    
</head>

<body>
    <?php
    include 'sideBarAd.php'; ?>
    <div class="main-content">
        <h2 style="text-align: center; margin: 20px auto; font-size:30px;">Reply Complaints</h2>
    <div class="reply-container">
        

        <?php

        include_once 'connect.php';


        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $complaint_id = $_GET['id'];


            $query = "SELECT * FROM complaint WHERE id = '$complaint_id'";
            $result = mysqli_query($connect, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>

                <!-- Display the edit form -->
                <form action="reply.php" method="POST">
                    <input type="hidden" name="complaint_id" value="<?php echo $row['id']; ?>">

                    <label for="name">Email:</label>
                    <input type="text" id="name" name="name" value="<?php echo $row['u_email']; ?>" required>

                    <label for="complaint">Complaint:</label>
                    <textarea id="complaint" name="complaint" rows="4" cols="50"
                        required><?php echo $row['complaint']; ?></textarea>

                    <label for="reply">Reply:</label>
                    <textarea id="reply" name="reply" rows="4" cols="50" required><?php echo $row['reply']; ?></textarea>

                    <input type="submit" name="update" value="Reply">
                </form>

                <?php
            } else {
                echo "invalid.";
            }
       } else {
            echo "invalid.";
        }

        mysqli_close($connect);
        ?>
    </div>
</div>
</body>

</html>