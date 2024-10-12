<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Side bar</title>
	<link rel="stylesheet" href="sideBarAd.css">
</head>

<body>

	<nav class="nav">


		<ul>


			<li class="nav-option option1">
				<a href="manage_admin.php"> Manage </a>


			</li>
			<li class="nav-option option1">
				<a href="add_admin.php"> Add </a>


			</li>
			<li class="nav-option option1">
				<a href="apartment_view.php"> Apartments </a>


			</li>
			<li class="nav-option option1">
				<a href="user_manage.php">Users </a>


			</li>
			<li class="nav-option option1">
				<a href="manage_review.php"> Review </a>


			</li>
			<li class="nav-option option1">
				<a href="manage_complaint.php"> Complain </a>


			</li>
			<li class="nav-option option1">
				<a href="adminlogout.php"> Logout </a>
			</li>

			</li>
			<li>
				<?php

				include 'connect.php';

				session_start();

				$id = $_SESSION['a']['a_id'];

				if (!isset($id)) {

					header('location:signInAd.php');

				}
				$query = "SELECT * FROM `admin` WHERE a_id = '$id'";
				$rs = mysqli_query($connect, $query);


				$data = $rs->fetch_assoc();


				?>
				<div class="profpic">
					<?php
					if (empty($data["a_image"])) {
						?>
						<img src="#" id="viewImg" class="user-img">
						<?php
					} else {
						?>
						<img src="img/<?php echo ($data["a_image"]); ?>" id="viewImg" class="user-img">
						<?php
					}
					?>
				</div>
				<div class="bold">
					<p><?php echo ($data["a_name"]); ?>&nbsp;</p>
					<p><?php echo ($data["a_email"]); ?></p>
				</div>
				</div>



			</li>
		</ul>



	</nav>


</body>

</html>