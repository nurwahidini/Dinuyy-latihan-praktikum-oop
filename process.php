<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "registrasi";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data dari form
$nama = $_POST['nama'];
$agama = $_POST['agama'];
$jabatan = $_POST['jabatan'];
$status = $_POST['status'];
$jumlahAnak = ($status === 'menikah') ? $_POST['jumlahAnak'] : null;

// Menyisipkan data ke dalam database
$sql = "INSERT INTO nama_tabel (nama, agama, jabatan, status, jumlah_anak) VALUES ('$nama', '$agama', '$jabatan', '$status', '$jumlahAnak')";

if ($conn->query($sql) === TRUE) {
  echo "Registrasi berhasil!";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
