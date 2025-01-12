<?php
require ('../config/koneksi.php');

$id = $_GET['id'];
$sql = "DELETE FROM mahasiswa WHERE id = $id";

if ($koneksi->query($sql)) {
    header("Location: dashboard.php");
} else {
    echo "Error: " . $koneksi->error;
}
?>
