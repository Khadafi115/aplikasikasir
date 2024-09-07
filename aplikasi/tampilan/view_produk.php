<?php
include '../inc.php'; // Koneksi ke database

// Query untuk mengambil data produk dari database
$sql = "SELECT ProdukID, NamaProduk, Harga, Jumlah FROM produk";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
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

        <!-- Total Harga -->
        <div class="total-container">
            <h3>Total Harga: Rp <span id="totalPrice">0</span></h3>
            <button id="clearAll">Hapus Semua</button>
        </div>

        <!-- Button Kembali -->
        <a href="../tampilan/index.php">
            <button type="button" class="view-button">Kembali</button>
        </a>

        <?php
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