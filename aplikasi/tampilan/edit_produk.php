<?php
// Koneksi ke database
$host = "localhost"; // Sesuaikan dengan konfigurasi database Anda
$user = "root"; // Sesuaikan dengan username database
$password = ""; // Sesuaikan dengan password database
$database = "aplikasi"; // Ganti dengan nama database Anda
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data produk berdasarkan ProdukID
if (isset($_GET['id'])) {
    $produkID = $_GET['id'];
    $query = "SELECT * FROM Produk WHERE ProdukID = $produkID";
    $result = $conn->query($query);
    $produk = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Edit Produk</h2>
    <form action="../tampilan/update_produk.php" method="POST">
        <input type="hidden" name="ProdukID" value="<?php echo $produk['ProdukID']; ?>">
        <label>Nama Produk:</label><br>
        <input type="text" name="NamaProduk" value="<?php echo $produk['NamaProduk']; ?>"><br>
        <label>Harga:</label><br>
        <input type="text" name="Harga" value="<?php echo $produk['Harga']; ?>"><br>
        <label>Jumlah:</label><br>
        <input type="number" name="Jumlah" value="<?php echo $produk['Jumlah']; ?>"><br><br>
        <input type="submit" value="Update Produk">
    </form>
</body>
</html>
