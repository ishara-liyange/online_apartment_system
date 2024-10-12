<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link rel="stylesheet" href="add_admin.css" />
   
</head>

<body>
    
    <?php
    include 'sideBarAd.php'; ?>

    <?php
    include 'connect.php' ?>
    <div class="main-content"><h2 style="text-align: center; margin: 5px auto; font-size: 30px;">Add Admin</h2>
        <div class="form-container">
            <div class="form-outliner">
                <form action="add_admin.php" method="POST" enctype="multipart/form-data">
                    <div class="main-form">
                    <div class="section1">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                 
                    
                        <label for="name">NIC:</label>
                        <input type="text" id="nic" name="nic" required>
                  
                    
                        <label for="name">Phone:</label>
                        <input type="text" id="phone" name="phone" required>
                
                    
                        <label for="name">Email:</label>
                        <input type="email" id="email" name="email" required>
                  
                    
                        <label for="name">Username :</label>
                        <input type="text" id="username" name="username" required>
               
                    
                        <label for="email">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div> 
                    </div>
                <div class="section2">
                    <div class="form-group">
                        <label for="profileImage">Profile Image:</label>
                        <input type="file" id="profileImage" name="profileImage" required>
                        <img id="imagePreview" src="#" alt="Preview"
                            style="display: none; max-width: 200px; margin-top: 10px;">
                    </div>
                </div>
            </div>

                    <div class="add-group">
                        <input class="add-btn" type="submit" value="Add Admin">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    // submitReview.php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = $_POST['name'];
        $nic = $_POST['nic'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $profileImage = $_FILES['profileImage'];



        if ($_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {

            $profileImageName = uniqid() . '_' . $_FILES['profileImage']['name'];

            $targetDirectory = "img/";

            $targetFilePath = $targetDirectory . $profileImageName;


            if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFilePath)) {




                if ($connect->connect_error) {
                    die("Connection failed: " . $connect->connect_error);
                }


                $sql = "INSERT INTO admin (a_name, a_image, a_email, a_nic , a_phone, a_username,a_password) VALUES ('$name', '$profileImageName', '$email','$nic','$phone','$username','$password')";

                if ($connect->query($sql) === TRUE) {
                    echo "<script>alert('Admin added successfully!');</script>";
                    echo"<script>window.location.href='manage_admin.php'</script>";
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $connect->error;
                }


                $connect->close();
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    }
    ?>

</body>
<script>
    // Function to handle file input change
    document.getElementById('profileImage').addEventListener('change', function (event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function () {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.src = reader.result;
            imagePreview.style.display = 'block'; // Show the image preview
        };

        // Read the selected image file
        reader.readAsDataURL(input.files[0]);
    });
</script>

</html>