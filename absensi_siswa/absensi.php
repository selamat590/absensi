<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Input Absensi</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.blade.php'; ?>
<div class="container">
  <h2>Input Absensi - <?= date('Y-m-d') ?></h2>
  <form method="POST">
    <table class="table table-bordered">
      <tr>
        <th>Nama</th><th>Kelas</th><th>Status</th>
      </tr>
      <?php
      $siswa = mysqli_query($conn, "SELECT * FROM siswa");
      while ($d = mysqli_fetch_assoc($siswa)) {
      ?>
      <tr>
        <td><?= $d['nama'] ?></td>
        <td><?= $d['kelas'] ?></td>
        <td>
          <input type="hidden" name="siswa_id[]" value="<?= $d['id'] ?>">
          <select name="status[]" class="form-select">
            <option value="Hadir">Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
            <option value="Alfa">Alfa</option>
          </select>
        </td>
      </tr>
      <?php } ?>
    </table>
    <button type="submit" class="btn btn-primary">Simpan Absensi</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = date('Y-m-d');
    foreach ($_POST['siswa_id'] as $key => $id) {
      $status = $_POST['status'][$key];
      mysqli_query($conn, "INSERT INTO absensi (siswa_id, tanggal, status) VALUES ('$id', '$tanggal', '$status')");
    }
    echo "<div class='alert alert-success mt-3'>Absensi berhasil disimpan!</div>";
  }
  ?>
</div>
</body>
</html>
