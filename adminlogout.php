<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
echo "<script> alert('Logout Successfully'); </script>";
echo"<script>window.location.href='index.php'</script>";
exit;
?>
