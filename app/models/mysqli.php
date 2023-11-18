<?php
$name = "root";
$sever = "localhost";
$password = "root";
$database = "duan1";

$conn = new mysqli($sever, $name, $password, $database);

if ($conn->connect_error) {
    die("OOP !, something went wrong bitch");
}

?>