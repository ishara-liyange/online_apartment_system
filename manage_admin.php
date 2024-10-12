<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manage Admin</title>
    <link rel="stylesheet" href="manage_admin.css"> 


</head>

<body >

       <?php
    include 'sideBarAd.php';
    include 'connect.php';
    $a_count_sql = "SELECT COUNT(*) AS a_count FROM apartment";
    $a_count_result = $connect->query($a_count_sql);
    $ap_count = $a_count_result->fetch_assoc();

     $u_count_sql = "SELECT COUNT(*) AS u_count FROM users";
    $u_count_result = $connect->query($u_count_sql);
    $user_count = $u_count_result->fetch_assoc();
     ?>


    <div class="main-content">
        <div class ="main-card">
            <div class="card">
                <p style="margin-bottom: 10px;"><?php echo $ap_count['a_count']; ?></p>
                <p>Apartment Count</p>
            </div>
            <div class="card">
                <p style="margin-bottom: 10px;"><?php echo $user_count['u_count']; ?></p>
                <p>User Count</p>
            </div>
        </div>

        <h2 style="text-align: center; margin: 30px auto; font-size: 30px;">Manage Admins</h2>
        <div class="container">

    <?php
    





    $sql = "SELECT * FROM admin";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Email</th>
            <th>Nic</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>";

        // Output data of each admin
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["a_id"] . "</td>";
            echo "<td>" . $row["a_name"] . "</td>";
            echo "<td><img src='img/" . $row["a_image"] . "' alt='admin_Image' style='max-width: 100px; max-height: 100px;'></td>";
            echo "<td>" . $row["a_email"] . "</td>";
            echo "<td>" . $row["a_nic"] . "</td>";
            echo "<td>" . $row["a_phone"] . "</td>";

            echo "<td>
            <div style='display: flex; justify-content: center;'>
                    <form method='post' action='manage_admin.php'>
                        <input type='hidden' name='a_id' value='" . $row["a_id"] . "'>
                        <button type='submit' class='delete-button'>Delete</button>
                    </form>
                    <form  method='get' action='update_admin.php'>
                            <input type='hidden' name='id' value='" . $row["a_id"] . "'>
                            <button type='submit' class='edit-button'>Edit</button>
                    </form>
                    </div>
                </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No admins found.";
    }
    ?>
</div>
    <div style="display: flex; justify-content: center; margin: 30px 0;">
        <form method="get" action="add_admin.php">
            <button type="submit" class="add-button">Add Admin</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['a_id'])) {
        // Get the admin ID from the POST data
        $admin_id = $_POST['a_id'];

        // Construct the delete query
        $delete_query = "DELETE FROM admin WHERE a_id = $admin_id";

        // Execute the delete query
        if ($connect->query($delete_query) === TRUE) {
            echo "<script>alert('Admin deleted successfully!');</script>";
            echo"<script>window.location.href='manage_admin.php'</script>";
            
        } else {
            echo "Error deleting admin: " . $connect->error;
        }
    }
    ?>

</div>

</body>

</html>