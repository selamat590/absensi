-- Buat database
CREATE DATABASE db_absensi;
USE db_absensi;

-- Tabel siswa
CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(50) NOT NULL
);

-- Tabel absensi
CREATE TABLE absensi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    siswa_id INT NOT NULL,
    tanggal DATE NOT NULL,
    status ENUM('Hadir', 'Izin', 'Sakit', 'Alfa') NOT NULL,
    FOREIGN KEY (siswa_id) REFERENCES siswa(id)
);
