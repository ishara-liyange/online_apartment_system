<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <link rel="shortcut icon" type="image" href="img/smish logo.png">
    <link rel="stylesheet" href="header.css">

</head>

<body>
    <!-- top navbar -->
    <header class="nav_bars_container">

        <div class="top_navbar">
            <div>
                <img class="navbar-brand" src="img/Gray Buinding Apartment logo.png" alt="logo" width="95px">
            </div>

            <div class="title"> 
                <h1>SMISH APARTMENTS</h1>
            </div>
        </div>

        <!-- navbar -->
        <div class="nav_container">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="apartment.php">Apartments</a></li>
                    <li><a href="about_us.php">About</a></li>
                    <li><a href="review.php">Review</a></li>
                    <li><a href="add_complaint.php">Contact</a></li>
                </ul>
            </nav>
            
                    <?php

                    session_start();
                    if (isset($_SESSION['user'])) {
                        $username = $_SESSION['user']['name'];
                        $profileImage = $_SESSION['user']['profile_image'];
                        echo "<div class='dropdown'>
                                  <a href='#'><img src='profile_img/$profileImage' alt='Profile Image' style='width: 40px; height: 40px; border-radius: 50%;'></a>
                                  <div class='dropdown-content'>
                                      <a href='user_profile.php'>Profile</a>
                                      <a href='logout.php'>Logout</a>
                                  </div>
                              </div>";
                    } else {
                        echo "<li><a href='login.php'>Login</a></li>";
                    }

                    ?>

        </div>       
    </header>

    <!-- Start Content-->

    <main>

    </main>
</body>

</html>