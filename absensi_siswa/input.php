<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Siswa</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.blade.php'; ?>
<div class="container">
  <h2>Tambah Siswa</h2>
  <form method="POST" action="">
    <input type="text" name="nis" class="form-control mb-2" placeholder="NIS" required>
    <input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
    <input type="text" name="kelas" class="form-control mb-2" placeholder="Kelas" required>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    mysqli_query($conn, "INSERT INTO siswa (nis, nama, kelas) VALUES ('$nis', '$nama', '$kelas')");
    echo "<div class='alert alert-success mt-3'>Data siswa berhasil ditambahkan!</div>";
  }
  ?>
</div>
</body>
</html>
