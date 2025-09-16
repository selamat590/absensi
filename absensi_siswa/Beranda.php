<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Home - Absensi Sekolah</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.blade.php'; ?>

<div class="container">
  <?php
session_start();
if (!isset($_SESSION['guru_id'])) {
  header("Location: login.php");
  exit();
}
?>
<h2></h2>
  <h1>Selamat datang, <?php echo $_SESSION['guru_nama']; ?>! di Sistem Absensi Sekolah SMK Karya Nasional Sindakasih</h1>
  <p>Gunakan menu di atas untuk mengelola data siswa dan mencatat absensi.</p>

<table class="table table-bordered">
    <tr>
      <th>No</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $data = mysqli_query($conn, "SELECT * FROM siswa");
    while ($d = mysqli_fetch_assoc($data)) {
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $d['nis'] ?></td>
      <td><?= $d['nama'] ?></td>
      <td><?= $d['kelas'] ?></td>

    </tr>
    <?php } ?>
  </table>
</div>
</body>
</html>
