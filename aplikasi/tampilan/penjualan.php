<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Penjualan</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <h1>Input Penjualan</h1>

        <!-- Form Input Pembelian -->
        <form action="../tampilan/insert_penjualan.php" method="POST">
            <label for="TanggalPenjualan">Tanggal Penjualan:</label>
            <input type="date" name="TanggalPenjualan" id="TanggalPenjualan" required>

            <label for="iduser">Produk ID:</label>
            <input type="number" name="ProdukID" id="ProdukID" placeholder="Masukkan Produk ID" required>

            <label for="TotalHarga">Total Harga:</label>
            <input type="number" step="0.01" name="TotalHarga" id="TotalHarga" placeholder="Masukkan Total Harga" required>

            <label for="iduser">ID User:</label>
            <input type="number" name="iduser" id="iduser" placeholder="Masukkan ID User" required>

            <label for="JumlahProduk">Jumlah Produk:</label>
            <input type="number" name="JumlahProduk" id="JumlahProduk" placeholder="Masukkan Jumlah Produk" required>

            <button type="submit">Tambah Penjualan</button>

            <!-- Button Kembali -->
            <a href="../tampilan/index.php">
                <button type="button" class="view-button">Kembali</button>
            </a>
        </form>

        <!-- Daftar Produk -->
        <div class="table-container">
            <h2>Daftar Produk</h2>
            <table id="productTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <!-- <tbody id="productList"> -->
                <?php include '../tampilan/display_produk.php'; ?>
                </tbody>

            </table>
        </div>
        <?php
        // Connect to the database
        $conn = new mysqli('localhost', 'root', '', 'aplikasi');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Cek apakah ada hasil dari query
        if ($result->num_rows > 0) {
            // Looping melalui setiap baris hasil
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ProdukID'] . "</td>";
                echo "<td>" . $row['NamaProduk'] . "</td>";
                echo "<td>" . $row['Harga'] . "</td>";
                echo "<td>" . $row['Jumlah'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
        }
        ?>
        </tbody>
        </table>
    </div>
</body>

</html>