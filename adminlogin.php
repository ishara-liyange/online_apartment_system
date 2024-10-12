<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="adminlogin.css">

</head>

<body>


    <div class="container">
        <form method="POST" action="adminlogin.php">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>


            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>


            <div class="form-button">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</body>

</html>

<?php
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username and password match the admin table
    $query = "SELECT * FROM admin WHERE a_username = '$username' AND a_password = '$password'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) == 1) {
        $admin = mysqli_fetch_assoc($result);


        session_start();
        $_SESSION['a'] = $admin;

        setcookie("username", $username, time() + (60 * 60 * 24 * 7));
        setcookie("password", $password, time() + (60 * 60 * 24 * 7));
        echo "<script>alert('admin login successfull!');</script>";
        echo "<script>window.location.href='manage_admin.php'</script>";
        exit;
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>