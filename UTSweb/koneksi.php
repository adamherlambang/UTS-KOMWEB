<?php
$servername = "localhost";
$username = "u834314004_utsweb";
$password = "Utsweb123";
$dbname = "u834314004_utsweb";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set karakter encoding agar mendukung UTF-8
if (!$conn->set_charset("utf8mb4")) {
    die("Error loading character set utf8mb4: " . $conn->error);
}
?>
