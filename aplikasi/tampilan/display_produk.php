<?php
// Connect to your database
$conn = new mysqli('localhost', 'root', '', 'aplikasi');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT * FROM produk";
$result = $conn->query($sql);

$totalPrice = 0; // Initialize total price

if ($result->num_rows > 0) {
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        $id = $row['ProdukID'];
        $nama = $row['NamaProduk'];
        $harga = $row['Harga'];
        $jumlah = $row['Jumlah'];
        $totalProductPrice = $harga * $jumlah;

        // Update total price
        $totalPrice += $totalProductPrice;

        echo "<tr>
                <td>{$no}</td>
                <td>{$nama}</td>
                <td>{$harga}</td>
                <td>{$jumlah}</td>
                <td>{$totalProductPrice}</td>
                <td><a href='../tampilan/edit_produk.php?id={$id}'>Edit</a> | <a href='../tampilan/delete_produk.php?id={$id}'>Delete</a></td>
              </tr>";
        $no++;
    }
} else {
    echo "<tr><td colspan='6'>No products found</td></tr>";
}

$conn->close();
?>

<script>
    // Update the total price in the HTML
    document.addEventListener('DOMContentLoaded', function() {
        var totalPrice = <?php echo $totalPrice; ?>;
        document.getElementById('totalPrice').textContent = totalPrice;
    });
</script>
