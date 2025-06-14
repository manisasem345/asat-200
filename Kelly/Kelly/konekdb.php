<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "asat_10sija"; 

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Set charset
$conn->set_charset("utf8mb4");
?>