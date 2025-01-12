<?php

require('../config/koneksi.php');

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

// Fetch data dari database berdasarkan ID
$sql = "SELECT * FROM mahasiswa WHERE id = $id";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan!";
    exit;
}

if (isset($_POST['submit'])) {
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $nim_mahasiswa = $_POST['nim'];
    $daftar_kelas = $_POST['daftar_kelas'];
    $nilai_uts = $_POST['uts'];
    $nilai_uas = $_POST['uas'];
    $tugas = $_POST['tugas'];
    $kehadiran = $_POST['kehadiran'];
    $partisipasi = $_POST['partisipasi'];

    // Update data di database
    $sql_update = "UPDATE mahasiswa SET 
        nama_mahasiswa = '$nama_mahasiswa',
        nim = '$nim_mahasiswa',
        kelas = '$daftar_kelas',
        uts = '$nilai_uts',
        uas = '$nilai_uas',
        tugas = '$tugas',
        kehadiran = '$kehadiran',
        partisipasi = '$partisipasi'
        WHERE id = $id";

    if ($koneksi->query($sql_update)) {
        echo "Data berhasil diperbarui!";
        header("Location: ./dashboard.php");
    } else {
        echo "Error: " . $koneksi->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Input Nilai</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../img/logo.png">

    <!-- Link Bootstrapp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Link Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-success">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="#"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <img class="img" src="../img/logo.png" alt="">
                        <span class="fs-4 d-none d-sm-inline"><b>INPUT NILAI MAHASISWA</b></span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link align-middle px-0 text-light fs-5">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Daftar Nilai</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="create.php" class="nav-link align-middle px-0 text-light fs-5">
                                <i class="bi bi-journal-bookmark fs-5"></i> <span class="ms-1 d-none d-sm-inline">Tambah
                                    Nilai</span>
                            </a>
                        </li>
                        <li>
                            <a href="exportpdf.php" class="nav-link px-0 align-middle px-0 text-light fs-5">
                                <i class=" fs-4 bi bi-filetype-pdf"></i> <span class="ms-1 d-none d-sm-inline">Export
                                    Nilai</span></a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <b>
                            <a href="../login.php" class="nav-link px-0 align-middle px-0 text-light fs-5">
                                <i class="fs-4 bi bi-door-closed"></i> <span
                                    class="ms-1 d-none d-sm-inline">Logout</span></a>
                        </b>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                <h1 class="jdl">Form Edit Nilai</h1>
                <div class="mx-auto">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label>Kelas:</label>
                            <select id="kelasSelect" name="daftar_kelas" required>
                                <option value="">-- Pilih Kelas --</option>
                                <option value="TI 5A" <?= $data['kelas'] == 'TI 5A' ? 'selected' : '' ?>>TI 5A</option>
                                <option value="TI 5B" <?= $data['kelas'] == 'TI 5B' ? 'selected' : '' ?>>TI 5B</option>
                                <option value="TI 5C" <?= $data['kelas'] == 'TI 5C' ? 'selected' : '' ?>>TI 5C</option>
                                <option value="TI 5D" <?= $data['kelas'] == 'TI 5D' ? 'selected' : '' ?>>TI 5D</option>
                                <option value="TI 5E" <?= $data['kelas'] == 'TI 5E' ? 'selected' : '' ?>>TI 5E</option>
                                <option value="TI 5F" <?= $data['kelas'] == 'TI 5F' ? 'selected' : '' ?>>TI 5F</option>
                                <option value="TI 5G" <?= $data['kelas'] == 'TI 5G' ? 'selected' : '' ?>>TI 5G</option>
                            </select><br><br>
                        </div>
                        <div class="mb-3">
                            <label>Nama Mahasiswa:</label>
                            <input type="text" name="nama_mahasiswa" class="form-control" required
                                value="<?= $data['nama_mahasiswa'] ?>">
                        </div>
                        <div class="mb-3">
                            <label>NIM Mahasiswa:</label>
                            <input type="text" name="nim" class="form-control" required value="<?= $data['nim'] ?>">
                        </div>
                        <div class="mb-3">
                            <label>Nilai UTS:</label>
                            <input type="text" name="uts" class="form-control" required value="<?= $data['uts'] ?>">
                        </div>
                        <div class="mb-3">
                            <label>Nilai UAS:</label>
                            <input type="text" name="uas" class="form-control" required value="<?= $data['uas'] ?>">
                        </div>
                        <div class="mb-3">
                            <label>Nilai Tugas:</label>
                            <input type="text" name="tugas" class="form-control" required value="<?= $data['tugas'] ?>">
                        </div>
                        <div class="mb-3">
                            <label>Nilai Kehadiran:</label>
                            <input type="text" name="kehadiran" class="form-control" required
                                value="<?= $data['kehadiran'] ?>">
                        </div>
                        <div class="mb-3">
                            <label>Nilai Partisipasi:</label>
                            <input type="text" name="partisipasi" class="form-control" required
                                value="<?= $data['partisipasi'] ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>