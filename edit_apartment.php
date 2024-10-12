<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Apartment</title>
    <link rel="stylesheet" href="edit_apartment.css">

</head>

<body>
    

   <?php
include 'connect.php';

echo "<h2>Update Apartment</h2>";

session_start();

// Check if apartment ID is provided in the URL
if (!isset($_GET['id'])) {
    echo "Apartment ID not provided.";
    exit;
}

// Fetch apartment details based on the ID
$apartment_id = $_GET['id'];
$user_id = $_SESSION['user']['id'];
$sql = "SELECT * FROM apartment WHERE id = $apartment_id AND userid = $user_id";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Apartment not found.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $price = $_POST["price"];
    $available = $_POST["available"];

    // Check if image is uploaded
    if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        // Handle image upload
        $targetDirectory = "apartment_image/";
        $uniqid = uniqid();
        $targetFile = $targetDirectory . $uniqid . "_" . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check file size
        if ($_FILES["image"]["size"] > 5000000) { // 5 MB limit
            echo "Sorry, your file is too large.";
            exit;
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Update apartment details in the database with new image
            $sql = "UPDATE apartment SET name='$name', address='$address', city='$city', price='$price', available='$available', image='$targetFile' WHERE id=$apartment_id AND userid=$user_id";
            if ($connect->query($sql) === TRUE) {
                echo "<script> alert('Apartment updated successfully!'); </script>";
                echo "<script>window.location.href = 'seller_apartments.php'</script>";
                exit;
            } else {
                echo "Error updating apartment: " . $connect->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // No image uploaded, update apartment details without changing the image
        $sql = "UPDATE apartment SET name='$name', address='$address', city='$city', price='$price', available='$available' WHERE id=$apartment_id AND userid=$user_id";
        if ($connect->query($sql) === TRUE) {
            echo "Apartment updated successfully!";
            header("Location: seller_apartments.php");
            exit;
        } else {
            echo "Error updating apartment: " . $connect->error;
        }
    }
}
?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $apartment_id; ?>"
        enctype="multipart/form-data">
        <div class="main-section">
            <div class="section1">
        <div>
            <label for="name">Name:</label> 
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required>
        </div>
        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="<?php echo $row['city']; ?>" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>" required>
        </div>
        <div>
            <label for="available">Available:</label>
            <select id="available" name="available" required>
                <option value="1" <?php if ($row['available'] == 1)
                    echo 'selected'; ?>>Available</option>
                <option value="0" <?php if ($row['available'] == 0)
                    echo 'selected'; ?>>Not available</option>
            </select>
        </div>
        </div>
<div class="section1">
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" onchange="showNewImage(event)">
        </div>
        <div id="image-container">
            <img src="<?php echo $row['image']; ?>" id="old-image" >
            <div class=" new-image-container">
            <img src="" id="new-image">
        </div>
        </div>
        </div>
</div>
        <div class="form-button">
        <input type="submit" value="Update Apartment">
</div>
    </form>
</body>
<script>
    function showNewImage(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function () {
            var newImage = document.getElementById('new-image');
            var oldImage = document.getElementById('old-image');
            newImage.src = reader.result;
            newImage.parentNode.style.display = 'block';
            oldImage.style.display = 'none';
        };

        reader.readAsDataURL(input.files[0]);
    }
</script>

</html>