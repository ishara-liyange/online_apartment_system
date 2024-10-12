<?php
 include 'connect.php';

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $username = $_POST["username"];
     $password = $_POST["password"];

     // Check if the username and password match the user table
     $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
     $result = mysqli_query($connect, $query);

     if (mysqli_num_rows($result) == 1) {
         $user = mysqli_fetch_assoc($result);

         session_start();
         $_SESSION['user'] = $user;

         // Check user role and redirect accordingly
         if ($user['role'] == 'seller') {
             echo "<script>alert('login success');</script>";
             echo "<script>window.location.href = 'index.php';</script>";
             exit;
         } else {
             echo "<script>alert('login success');</script>";
             echo "<script>window.location.href = 'index.php';</script>";
             exit;
         }
     } else {
         echo "<script>alert('Invalid username or password');</script>";
     }
 }

 if(isset($_POST['remember'])) {
    // Set cookie to remember the user's username or email
    $cookie_name = "remember_username_or_email";
    $cookie_value = $_POST['user']; // Assuming 'uid' is the name of your input field
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 30 days expiration
 }
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>

</head>

<body>



    <div class="form-login">
        <form method="POST" action="login.php">
            <h2>Sign for Your Account</h2>
            <div class="form-log">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required placeholder=" ex:kamal123"><br><br>
            </div>

            <div class="form-log">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder=" ex:kamal@123@"><br><br>
            </div>

            <div class="showPassword">
                <input type="checkbox" id="showPassword">
                <label for="showPassword">Show Password</label>
            </div>

            <div class="remember">
                <input type="checkbox" id="remember">
                <label for="remember">Remember Me</label>
            </div>

            <div class="form-button">
                <input type="submit" value="Login">
                <button class="signup-button" onclick="window.location.href='signup.php'">Sign Up</button>
            </div>

        </form>

        <script>
            const passwordInput = document.getElementById('password');
            const showPasswordCheckbox = document.getElementById('showPassword');

            showPasswordCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    passwordInput.type = 'text'; // Show password
                } else {
                    passwordInput.type = 'password'; // Hide password
                }
            });

        </script>

</body>

</html>