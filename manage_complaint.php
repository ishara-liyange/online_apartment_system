<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Complaints</title>
    <link rel="stylesheet" href="manage_complaint.css">

</head>

<body>
    <?php
    include 'sideBarAd.php'; ?>
    <div class="main-content">
        <h2 style="text-align: center; margin: 20px auto;">All Complaints</h2>
        <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Complaint</th>
                    <th>Reply</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connect.php';

                // Retrieve all complaints from the database
                $query = "SELECT * FROM complaint";
                $result = mysqli_query($connect, $query);

                // Check if there are any complaints
                if (mysqli_num_rows($result) > 0) {
                    // Display each complaint in a table row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['u_email'] . "</td>";
                        echo "<td>" . $row['complaint'] . "</td>";
                        // Check if the reply field is empty
                        if (!empty($row['reply'])) {
                            echo "<td>" . $row['reply'] . "</td>";
                        } else {
                            echo "<td><button class='add-button'><a style='text-decoration:none; color: white;' href='reply_complaint.php?id=" . $row['id'] . "'>Reply</a></button></td>";
                        }
                        // Add delete button in the action column
                        echo "<td>";
                        echo "<form action='manage_complaint.php' method='POST'>";
                        echo "<input type='hidden' name='complaint_id' value='" . $row['id'] . "'>";
                        echo "<input type='submit' class='delete-button' name='delete' value='Delete'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No complaints found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>

<?php
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {

    $complaint_id = $_POST['complaint_id'];


    $query = "DELETE FROM complaint WHERE id = '$complaint_id'";

    if (mysqli_query($connect, $query)) {
        echo "<script>alert('Complaint deleted successfully!');</script>";
        echo"<script>window.location.href='manage_complaint.php'</script>";
        exit();
    } else {

        echo "Error deleting record: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>