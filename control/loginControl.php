<?php
require('../config/koneksi.php');

// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Tangkap data login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Query untuk memeriksa username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            header("Location: ../component/dashboard.php");
            exit;
        } else {
            echo "<script>alert('Password salah!'); window.location.href='../login.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location.href='../login.php';</script>";
    }
}

// Tangkap data register
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Validasi input
    if (empty($nama) || empty($username) || empty($password)) {
        echo "<script>alert('Semua kolom wajib diisi!'); window.location.href='../login.php';</script>";
        exit;
    }

    // Cek apakah username sudah digunakan
    $query_check = "SELECT * FROM users WHERE username = '$username'";
    $result_check = mysqli_query($koneksi, $query_check);
    if ($result_check && mysqli_num_rows($result_check) > 0) {
        echo "<script>alert('Username sudah digunakan!'); window.location.href='../login.php';</script>";
        exit;
    }

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk menyimpan data
    $query = "INSERT INTO users (nama, username, password) VALUES ('$nama', '$username', '$hashed_password')";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='../login.php';</script>";
    } else {
        echo "<script>alert('Gagal registrasi: " . mysqli_error($koneksi) . "'); window.location.href='../login.php';</script>";
    }
}
?>
