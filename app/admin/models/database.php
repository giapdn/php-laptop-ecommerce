<?php
$host = "localhost";
$user = "root";
$password = "root";
$database = "data";
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
}
