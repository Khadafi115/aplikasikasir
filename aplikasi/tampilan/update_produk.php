<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'aplikasi');

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah form telah dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $ProdukID = $_POST['ProdukID'];
    $NamaProduk = $_POST['NamaProduk'];
    $Harga = $_POST['Harga'];
    $Jumlah = $_POST['Jumlah'];

    // Query untuk update produk
    $query = "UPDATE Produk SET NamaProduk='$NamaProduk', Harga='$Harga', Jumlah='$Jumlah' WHERE ProdukID='$ProdukID'";
    
    // Eksekusi query
    if ($conn->query($query) === TRUE) {
        echo "Produk berhasil diupdate!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Redirect ke halaman utama setelah update
    header('Location: ../tampilan/index.php');
}

// Tutup koneksi
$conn->close();
?>
