<?php
$DB_name = 'apartment_system';
$DB_username = 'root';
$DB_password = '';
$server = 'localhost';

$connect = new mysqli($server, $DB_username, $DB_password, $DB_name);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>