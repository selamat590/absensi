<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Data Siswa</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.blade.php'; ?>

<div class="container">
  <h2>Data Siswa</h2>
  <a href="input.php" class="btn btn-success mb-3">Tambah Siswa</a>
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
      <td>
        <a href="edit.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</div>
</body>
</html>
