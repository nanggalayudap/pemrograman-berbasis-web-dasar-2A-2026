<?php
$host = "localhost";
$user = "root";
$pass = "260607";
$db   = "inventaris_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}