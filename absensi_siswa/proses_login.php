<?php
session_start();
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM guru WHERE nama = '$nama'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['guru_id'] = $data['id'];
        $_SESSION['guru_nama'] = $data['nama'];
        header("Location: beranda.php");
        exit();
    } else {
        echo "Nama atau Password salah!";
    }
}
?>
