<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Rekap Absensi</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.blade.php'; ?>
<div class="container">
  <h2>Rekap Absensi</h2>
  <table class="table table-bordered">
    <tr>
      <th>Nama</th><th>Kelas</th>
      <th>Hadir</th><th>Izin</th><th>Sakit</th><th>Alfa</th>
    </tr>
    <?php
    $siswa = mysqli_query($conn, "SELECT * FROM siswa");
    while ($d = mysqli_fetch_assoc($siswa)) {
      $id = $d['id'];
      $hadir = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM absensi WHERE siswa_id=$id AND status='Hadir'"));
      $izin  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM absensi WHERE siswa_id=$id AND status='Izin'"));
      $sakit = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM absensi WHERE siswa_id=$id AND status='Sakit'"));
      $alfa  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM absensi WHERE siswa_id=$id AND status='Alfa'"));
    ?>
    <tr>
      <td><?= $d['nama'] ?></td>
      <td><?= $d['kelas'] ?></td>
      <td><?= $hadir ?></td>
      <td><?= $izin ?></td>
      <td><?= $sakit ?></td>
      <td><?= $alfa ?></td>
    </tr>
    <?php } ?>
  </table>
</div>
</body>
</html>
