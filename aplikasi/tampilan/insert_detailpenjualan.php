<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'aplikasi');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$penjualanID = $_POST['PenjualanID'];
$produkID = $_POST['ProdukID'];
$jumlahProduk = $_POST['JumlahProduk'];
$subtotal = $_POST['Subtotal'];

// Insert the sales detail into the database
$sql = "INSERT INTO detailpenjualan (PenjualanID, ProdukID, JumlahProduk, Subtotal) 
        VALUES ('$penjualanID', '$produkID', '$jumlahProduk', '$subtotal')";

if ($conn->query($sql) === TRUE) {
    // Redirect to the detail penjualan page
    header('Location: ../tampilan/view_detailpenjualan.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
