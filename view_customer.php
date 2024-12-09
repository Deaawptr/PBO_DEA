<?php
require_once 'Customer.php';
require_once 'CustomerManager.php';

$customerManager = new CustomerManager();

// Menangani form tambah customer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $customerManager->tambahCustomer($nama, $email, $alamat);
    header('Location: view_customer.php'); // Redirect untuk mencegah resubmission
    exit();
}

// Menangani hapus customer
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $customerManager->hapusCustomer($id);
    header('Location: view_customer.php'); // Redirect setelah hapus agar tidak resubmit
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Customer</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="container">
    <h1>Daftar Customer</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customerManager->getCustomer() as $customer): ?>
                <tr>
                    <td><?= htmlspecialchars($customer['id']); ?></td>
                    <td><?= htmlspecialchars($customer['nama']); ?></td>
                    <td><?= htmlspecialchars($customer['email']); ?></td>
                    <td><?= htmlspecialchars($customer['alamat']); ?></td>
                    <td>
                        <a href="?hapus=<?= urlencode($customer['id']); ?>" class="btn" style="background-color: #ff0808;">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>

    <form action="" method="POST">
        <h2>Tambah Customer</h2>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" id="alamat" required></textarea><br>

        <button type="submit" name="tambah" class="btn" style="background-color: #28a745;">Tambah Customer</button>
    </form>
    <a href="home.html" class="btn" style="background-color: blueviolet;">Home</a>
</div>
</body>
</html>
