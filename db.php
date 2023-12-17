<?php
$servername = "localhost";
$dbUsername = "root"; // Ganti dengan username database Anda
$dbPassword = ""; // Ganti dengan password database Anda
$dbname = "perpustakaan";

// Membuat koneksi
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
