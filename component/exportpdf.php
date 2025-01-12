<?php

require('../config/koneksi.php')

    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Mahasiswa</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../img/logo.png">

    <!-- Link Bootstrapp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Link Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Link DataTables (export to pdf) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <!-- <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <style>
        .col-auto {
            background: #198754;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
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
                                <i class="bi bi-journal-bookmark fs-4"></i> <span class="ms-1 d-none d-sm-inline">Tambah
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
                            <a href="login.php" class="nav-link px-0 align-middle px-0 text-light fs-5">
                                <i class="fs-4 bi bi-door-closed"></i> <span
                                    class="ms-1 d-none d-sm-inline">Logout</span></a>
                        </b>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                <h1 class="jdl">Daftar Nilai Mahasiswa</h1>
                <table class="table" id="mauexport">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">UTS</th>
                            <th scope="col">UAS</th>
                            <th scope="col">Tugas</th>
                            <th scope="col">Kehadiran</th>
                            <th scope="col">Partisipasi</th>
                            <th scope="col">Total Nilai</th>
                            <th scope="col">Predikat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM mahasiswa";
                        $result = $koneksi->query($sql);

                        $no = 1; // Inisialisasi nomor urut
                        while ($row = $result->fetch_assoc()) {
                            $total_nilai = ($row['uts'] + $row['uas'] + $row['tugas'] + $row['kehadiran'] + $row['partisipasi']) / 5; // Hitung total nilai
                            // Tentukan predikat berdasarkan total nilai
                            if ($total_nilai >= 85) {
                                $predikat = "A";
                            } elseif ($total_nilai >= 75) {
                                $predikat = "B";
                            } elseif ($total_nilai >= 65) {
                                $predikat = "C";
                            } elseif ($total_nilai >= 50) {
                                $predikat = "D";
                            } else {
                                $predikat = "E";
                            }
                            echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama_mahasiswa']}</td>
                        <td>{$row['nim']}</td>
                        <td>{$row['kelas']}</td>
                        <td>{$row['uts']}</td>
                        <td>{$row['uas']}</td>
                        <td>{$row['tugas']}</td>
                        <td>{$row['kehadiran']}</td>
                        <td>{$row['partisipasi']}</td>
                        <td>" . number_format($total_nilai, 2) . "</td>
                        <td>{$predikat}</td>
                    </tr>";
                            $no++; // Increment nomor urut
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Script Untuk Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>


    <!-- Script Untuk Memanggil DataTables (export pdf) -->
    <script>
        $(document).ready(function () {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'pdf'
                    ]
                // buttons: [
                //     'pdf', 'csv', 'excel', 'copy', 'print'
                //     ]
            });
        });

    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>

</html>