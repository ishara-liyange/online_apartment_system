<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Get the form data
    $id = $_POST['id'];
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $nic = isset($_POST['nic']) ? $_POST['nic'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';


    // Check if a new profile image is uploaded
    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] !== UPLOAD_ERR_NO_FILE) {
        $profileImageName = uniqid() . '_' . $_FILES['profileImage']['name'];
        $targetDirectory = "img/";
        $targetFilePath = $targetDirectory . $profileImageName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFilePath)) {
            // Update the review with the new profile image
            $sql = "UPDATE admin SET a_name='$name', a_image='$profileImageName', a_email='$email', a_nic='$nic', a_phone='$phone', a_username='$username', a_password='$password' WHERE a_id=$id";

            if ($connect->query($sql) === TRUE) {
                // Redirect back to the edit review page with a success message
                header("Location: manage_admin.php");
                exit;
            } else {
                echo "Error updating review: " . $connect->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // Update the admin without changing the profile image
        $sql = "UPDATE admin SET a_name='$name', a_email='$email', a_nic='$nic', a_phone='$phone', a_username='$username', a_password='$password' WHERE a_id=$id";

        if ($connect->query($sql) === TRUE) {
            echo "<script>alert('Admin Updated successfully!');</script>";
            header("Location: manage_admin.php");
            exit;
        } else {
            echo "Error updating review: " . $connect->error;
        }
    }
}
?>