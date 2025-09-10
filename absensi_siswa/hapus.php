<?php
include 'koneksi.php';

$id = $_GET['id'];

// Hapus data absensi yang terkait (jika ada)
mysqli_query($conn, "DELETE FROM absensi WHERE siswa_id='$id'");

// Hapus data siswa
mysqli_query($conn, "DELETE FROM siswa WHERE id='$id'");

header("Location: update_delete.php");
exit;
?>
