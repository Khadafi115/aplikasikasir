<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Penjualan</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">

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
            
            <!-- Button Kembali -->
            <a href="../tampilan/index.php">
                <button type="button" class="view-button">Kembali</button>
            </a>

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