<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Detail Penjualan</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <h1>Input Detail Penjualan</h1>

        <!-- Form to insert sales detail -->
        <form action="../tampilan/insert_detailpenjualan.php" method="POST">
            <label for="PenjualanID">Penjualan ID:</label>
            <input type="number" name="PenjualanID" id="PenjualanID" placeholder="Masukkan Penjualan ID" required>

            <label for="ProdukID">Produk ID:</label>
            <input type="number" name="ProdukID" id="ProdukID" placeholder="Masukkan Produk ID" required>

            <label for="JumlahProduk">Jumlah Produk:</label>
            <input type="number" name="JumlahProduk" id="JumlahProduk" placeholder="Masukkan Jumlah Produk" required>

            <label for="Subtotal">Subtotal:</label>
            <input type="number" step="0.01" name="Subtotal" id="Subtotal" placeholder="Masukkan Subtotal" required>

            <button type="submit">Tambah Detail Penjualan</button>

            <!-- Button Kembali -->
            <a href="../tampilan/index.php">
                <button type="button" class="view-button">Kembali</button>
            </a>
        </form>

        <!-- Table to display sales data -->
        <h2>Riwayat Penjualan</h2>
        <table>
            <thead>
                <tr>
                    <th>Penjualan ID</th>
                    <th>Produk ID</th>
                    <th>Tanggal Penjualan</th>
                    <th>Total Harga</th>
                    <th>ID User</th>
                    <th>Jumlah Produk</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connect to the database
                $conn = new mysqli('localhost', 'root', '', 'aplikasi');

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch data from the Penjualan table
                $sql = "SELECT * FROM penjualan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['PenjualanID']}</td>
                                <td>{$row['ProdukID']}</td>
                                <td>{$row['TanggalPenjualan']}</td>
                                <td>{$row['TotalHarga']}</td>
                                <td>{$row['iduser']}</td>
                                <td>{$row['JumlahProduk']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data available</td></tr>";
                }

                // Close the connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>