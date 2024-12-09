<?php
require_once 'barangManager.php';

$barangManager = new BarangManager();
$barangList = $barangManager->getBarang();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="stylist.css">
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
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barangList as $barang): ?>
                    <tr>
                        <td><?= htmlspecialchars($barang['id']); ?></td>
                        <td><?= htmlspecialchars($barang['nama']); ?></td>
                        <td>Rp <?= number_format($barang['harga'], 0, ',', '.'); ?></td>
                        <td><?= htmlspecialchars($barang['stok']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>