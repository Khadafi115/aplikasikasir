<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <h1>Detail Penjualan</h1>

        <!-- Table to display Detail Penjualan -->
        <table>
            <thead>
                <tr>
                    <th>DetailID</th>
                    <th>PenjualanID</th>
                    <th>ProdukID</th>
                    <th>Jumlah Produk</th>
                    <th>Subtotal</th>
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

                // Fetch data from DetailPenjualan table
                $sql = "SELECT * FROM DetailPenjualan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['DetailID']}</td>
                                <td>{$row['PenjualanID']}</td>
                                <td>{$row['ProdukID']}</td>
                                <td>{$row['JumlahProduk']}</td>
                                <td>{$row['Subtotal']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No data available</td></tr>";
                }

                // Close the connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
