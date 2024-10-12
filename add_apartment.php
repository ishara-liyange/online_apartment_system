

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Apartment</title>

    <!-- link external add_apartment.css file-->
    <link rel = "stylesheet" href = "add_apartment.css">
    
</head>

<body>

    <h2>Add Apartment</h2>
    <form method="POST" action="add_apartment.php" enctype="multipart/form-data">
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <div>
            <label for="name">Title:</label>
            <input type="text" id="name" name="name" placeholder = "Enter title" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" placeholder = "Enter address" required>
        </div>
        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" placeholder = "Enter city" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" placeholder = "Enter description" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" placeholder = "Enter price" required>
        </div>
        <div>
            <label for="available">Advertisement type:</label>
            <select id="available" name="available" required>
                <option value="1">Available</option>
                <option value="0">Not available</option>
            </select>
        </div>
        <input type="submit" value="Add Apartment">
    </form>

</body>

</html>

<?php
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user']['id'];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $price = $_POST["price"];
    $available = $_POST["available"];
    $description = $_POST["description"];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $apartmentImage = $_FILES['image']['name'];
        $apartmentImageTmp = $_FILES['image']['tmp_name'];


        $uniqueId = uniqid();
        $apartmentImageName = $uniqueId . '_' . $apartmentImage;


        $targetDirectory = "apartment_image/";
        $targetFile = $targetDirectory . basename($apartmentImageName);


        if (move_uploaded_file($apartmentImageTmp, $targetFile)) {

            $sql = "INSERT INTO apartment (userid, name, address, city, price, available, image,description) VALUES ('$user_id', '$name', '$address', '$city', '$price', '$available', '$targetFile','$description')";
            if ($connect->query($sql) === TRUE) {
                echo "Apartment added successfully!";
                header("Location: user_profile.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $connect->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {

        $sql = "INSERT INTO apartment (userid, name, address, city, price, available,description) VALUES ('$user_id', '$name', '$address', '$city', '$price', '$available','$description')";
        if ($connect->query($sql) === TRUE) {
            echo "Apartment added successfully!";
            echo "<script>window.location = 'user_profile.php'</script>";
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    }
}

?>