<?php
include 'connect.php';
include 'header.php';
$u = $_SESSION['user'];

// Fetch user data from the database
$sql = "SELECT * FROM users WHERE id = {$u['id']}";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user['id'] = $row['id']; // Add this line to fetch the user ID
    $user['name'] = $row['name'];
    $user['nic'] = $row['nic'];
    $user['phone'] = $row['phone'];
    $user['address'] = $row['address'];
    $user['dob'] = $row['dob'];
    $user['email'] = $row['email'];
    $user['username'] = $row['username'];
    $user['password'] = $row['password'];

    $user['profile_image'] = $row['profile_image']; // Add this line to fetch the profile image
} else {
    echo "<script>alert('No user found!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="user_profile.css">

</head>

<body>
    <div class="user-profile">
        <div class="user">
            <h1>User Profile</h1>
            <button class="update-btn" onclick="window.location.href='add_apartment.php'">Add Apartment</button>
            <button class="update-btn" onclick="window.location.href='seller_apartments.php'">Apartments</button>
        </div>

        <form class="form" method="POST" action="user_profile_update.php" enctype="multipart/form-data">
            <div class="form-body">
                <div class="form-log">

                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                    <div>
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>
                    </div>
                    <div>
                        <label for="nic">NIC:</label>
                        <input type="text" id="nic" name="nic" value="<?php echo $user['nic']; ?>" required>
                    </div>
                    <div>
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>
                    </div>
                    <div>
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>" required>
                    </div>
                    <div>
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" value="<?php echo $user['dob']; ?>" required>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                    </div>
                </div>
                <div class="form-log">
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>"
                            required>
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>"
                            required>
                    </div>
                    </br>
                    <div>
                        <label for="profile_image">Profile Picture:</label>
                        <input type="file" id="profile_image" name="profile_image" accept="image/*">
                        <?php if (isset($user['profile_image']) && !empty($user['profile_image'])): ?>
                            <img id="imagePreview" src="profile_img/<?php echo $user['profile_image']; ?>"
                                alt="Profile Image" style="max-width: 200px; max-height: 200px;">
                        <?php else: ?>
                            <img id="imagePreview" src="" alt="Profile Image"
                                style="max-width: 200px; max-height: 200px; display: none;">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-button">
                <input class="update-btn" type="submit" value="Update Profile">
            </div>
        </form>
        <div class="form-button">
            <form method="POST" action="delete_user.php">
                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                <input class="delete-btn" type="submit" value="Delete Account">
            </form>
        </div>
    </div>

    <script>
        document.getElementById('profile_image').addEventListener('change', function (event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function () {
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        });
    </script>

    <?php
    include 'footer.php';
    ?>

</body>

</html>