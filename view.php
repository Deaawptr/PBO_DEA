<?php
require_once 'Barang.php';
require_once 'BarangManager.php';

$barangManager = new BarangManager();

// Menangani form tambah barang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $barangManager->tambahBarang($nama, $harga, $stok);
    header('Location: view.php'); // Redirect untuk mencegah resubmission
    exit();
}

// Menangani penghapusan barang
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $barangManager->hapusBarang($id);
    header('Location: view.php'); // Redirect setelah menghapus
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="container">
    <h1>Daftar Barang</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barangManager->getBarang() as $barang): ?>
                <tr>
                    <td><?= htmlspecialchars($barang['id']); ?></td>
                    <td><?= htmlspecialchars($barang['nama']); ?></td>
                    <td>Rp <?= htmlspecialchars(number_format($barang['harga'], 0, ',', '.')); ?></td>
                    <td><?= htmlspecialchars($barang['stok']); ?></td>
                    <td>
                        <a href="?hapus=<?= urlencode($barang['id']); ?>" class="btn">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>
    <a href="index.html" class="btn" style="background-color: #28a745;">+ Tambah Barang</a>
    <a href="home.html" class="btn" style="background-color:blueviolet">Home</a>
</div>
</body>
</html>