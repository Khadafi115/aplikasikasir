<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <h1>Aplikasi Kasir</h1>

        <!-- Form Tambah Produk -->
        <form action="../tampilan/insert_produk.php" method="POST">
            <label for="productName">Nama Produk:</label>
            <input type="text" name="NamaProduk" id="NamaProduk" placeholder="Masukkan Nama Produk" required>

            <label for="productPrice">Harga:</label>
            <input type="number" name="Harga" id="Harga" placeholder="Masukkan Harga Produk" required>

            <label for="productQuantity">Jumlah:</label>
            <input type="number" name="Jumlah" id="Jumlah" placeholder="Masukkan Jumlah Jumlah" required>

            <button type="submit">Tambah Produk</button>

            <a href="../tampilan/view_produk.php">
                <button type="button" class="view-button">Daftar Produk</button>
            </a>

            <a href="../tampilan/detail.php"> 
                <button type="button" class="view-button">Input Detail Penjualan</button>
            </a>

            <a href="../tampilan/view_penjualan.php">
                <button type="button" class="view-button">Riwayat Penjualan</button>
            </a>

            <a href="../tampilan/penjualan.php">
                <button type="button" class="view-button">Input Penjualan</button>
            </a>

            <a href="../tampilan/view_detailpenjualan.php">
                <button type="button" class="view-button">Detail Penjualan</button>
            </a>
        </form>

        </div>

    </div>

    <script src="../script.js"></script>
</body>

</html>