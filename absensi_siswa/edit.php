<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$id'");
$siswa = mysqli_fetch_assoc($data);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nis   = $_POST['nis'];
    $nama  = $_POST['nama'];
    $kelas = $_POST['kelas'];

    mysqli_query($conn, "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas' WHERE id='$id'");
    header("Location: siswa_data.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Siswa</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.blade.php'; ?>
<div class="container">
  <h2>Edit Data Siswa</h2>
  <form method="POST">
    <input type="text" name="nis" value="<?= $siswa['nis'] ?>" class="form-control mb-2" required>
    <input type="text" name="nama" value="<?= $siswa['nama'] ?>" class="form-control mb-2" required>
    <input type="text" name="kelas" value="<?= $siswa['kelas'] ?>" class="form-control mb-2" required>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="siswa_data.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
