<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add_review.css">
</head>

<body>
    <?php
    include 'connect.php';
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION['user'])) {
        header("Location: login.php"); // Redirect to login page if not logged in
        exit;
    }

    // Fetch user details based on user ID from session
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = $connect->query($sql);

    // Check if user details were fetched successfully
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        ?>
        <div class="container">
    <form method="POST" action="add_review.php">
        <h1>Give Us Review</h1>
        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>"> <br><br>
        <input type="hidden" name="user_image" value="<?php echo $user['profile_image']; ?>"> <br><br>


        <input type="text" name="user_name" value="<?php echo $user['name']; ?>"><br><br>

        <input type="email" name="user_email" value="<?php echo $user['email']; ?>" readonly><br><br>
        <textarea name="comment" placeholder="Your Review" required></textarea><br><br>
        <button type="submit">Submit Review</button>

    </form>
</div>
    <?php
    } else {
        echo "User details not found.";
        exit;
    }
    ?>
</body>

</html>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $comment = $_POST["comment"];
    $image = $_POST["user_image"];

    $sql = "INSERT INTO reviews (user_id, user_name, user_image, email, comment) VALUES ('$user_id', '$user_name', '$image', '$user_email', '$comment')";
    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Review submitted successfully!');</script>";
        header("Location: review.php");
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
?>