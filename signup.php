<?php
include 'connect.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Database connection


    // Get the image file
    $profileImage = $_FILES['profile_image']['name'];
    $profileImageTmp = $_FILES['profile_image']['tmp_name'];

    // Generate a unique ID for the image file
    $uniqueId = uniqid();
    $profileImageName = $uniqueId . '_' . $profileImage;

    // Move the uploaded image to a desired location
    $targetDirectory = "profile_img/";
    $targetFile = $targetDirectory . basename($profileImageName);
    move_uploaded_file($profileImageTmp, $targetFile);

    $sql = "INSERT INTO users (name, nic, phone, address, dob, email, username, password, role, profile_image) VALUES ('$name', '$nic', '$phone', '$address', '$dob', '$email', '$username', '$password', '$role', '$profileImageName')";

    // Execute the statement
    if ($connect->query($sql) === TRUE) {

        echo "User inserted successfully!";
        echo '<script>window.location.href = "login.php";</script>';

    } else {
        echo "Error: " . $connect->error;
    }

    // Close the connection
    $connect->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">

</head>

<body>
    <div class="form-reg">

        <form action="signup.php" method="post" enctype="multipart/form-data">
            <h2>Register for a New User Account</h2>
            <div class="main-form">
                <div class="form-body">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required placeholder=" ex:Kamal Fernando"><br><br>

                    <label for="nic">NIC:</label>
                    <input type="text" id="nic" name="nic" required placeholder=" ex:200278900475"><br><br>

                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" required placeholder=" ex:0704687895"><br><br>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required
                        placeholder=" ex:145,Mihidu Mawatha,Colombo"><br><br>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required><br><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required
                        placeholder=" ex:kamal.fernando@gmail.com"><br><br>

                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required placeholder=" ex:kamal123"><br><br>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required placeholder=" ex:kamal@123@"><br><br>

                    <label for="password">Re-password:</label>
                    <input type="password" id="password2" name="password2" required
                        placeholder=" ex:kamal@123@"><br><br>

                    <label for="role">I am a:</label>
                    <select id="role" name="role">
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                    </select><br><br>

                    <label for="profile_image">Profile Image:</label>
                    <input type="file" id="profile_image" name="profile_image"><br><br>
                    <img id="imagePreview" src="" alt="" style="max-width: 200px; max-height: 200px;">
                </div>
            </div>
            <div class="form-button">
                <button class="signup-button" type="submit">Sign Up</button><br><br>
            </div>
        </form>
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

        var password = document.getElementById("password"),
            confirm_password = document.getElementById("password2");

        // Both passwords equal checking
        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

    </script>
</body>

</html>