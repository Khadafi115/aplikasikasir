<?php
include '../inc.php';

if (isset($_GET['id'])) {
    $produkID = $_GET['id'];

    // Query untuk menghapus produk
    $sql = "DELETE FROM produk WHERE ProdukID = '$produkID'";

    if ($conn->query($sql) === TRUE) {
        echo "Produk berhasil dihapus";
        header("Location: ../tampilan/index.php"); // Redirect ke halaman utama setelah sukses
    } else {
        echo "Error: " . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
}
?>
