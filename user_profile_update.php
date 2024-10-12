<?php
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $nic = $_POST["nic"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] !== UPLOAD_ERR_NO_FILE) {
        // Get the image file
        $profileImage = $_FILES['profile_image']['name'];
        $profileImageTmp = $_FILES['profile_image']['tmp_name'];

        // Generate a unique ID for the image file
        $uniqueId = uniqid();
        $profileImageName = $uniqueId . '_' . $profileImage;

        // Move the uploaded image to a desired location
        $targetDirectory = "profile_img/";
        $targetFile = $targetDirectory . basename($profileImageName);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($profileImageTmp, $targetFile)) {
            // Update the user with the new profile image
            $sql = "UPDATE users SET name='$name', nic='$nic', phone='$phone', address='$address', dob='$dob', email='$email', profile_image='$profileImageName', username='$username', password='$password' WHERE id=$user_id";

            if ($connect->query($sql) === TRUE) {
                // Update session data
                $_SESSION['user']['name'] = $name;
                $_SESSION['user']['nic'] = $nic;
                $_SESSION['user']['phone'] = $phone;
                $_SESSION['user']['address'] = $address;
                $_SESSION['user']['dob'] = $dob;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['profile_image'] = $profileImageName;

                echo "User data updated successfully!";
                // Redirect user back to the profile page
                header("Location: user_profile.php");
                exit;
            } else {
                echo "Error updating user data: " . $connect->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // Update the user without changing the profile image
        $sql = "UPDATE users SET name='$name', nic='$nic', phone='$phone', address='$address', dob='$dob', email='$email', username='$username', password='$password' WHERE id=$user_id";

        if ($connect->query($sql) === TRUE) {
            // Update session data
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['nic'] = $nic;
            $_SESSION['user']['phone'] = $phone;
            $_SESSION['user']['address'] = $address;
            $_SESSION['user']['dob'] = $dob;
            $_SESSION['user']['email'] = $email;

            
            echo "<script>alert('User data updated successfully!');</script>";
            header("Location: user_profile.php");
            exit;
        } else {
            echo "<script>alert('please enter correct details');</script>";
        }
    }
}
?>