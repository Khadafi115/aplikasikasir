<?php
include '../inc.php'; // File untuk koneksi ke database

// Cek apakah form sudah dikirim menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $namaProduk = $_POST['NamaProduk'];
    $harga = $_POST['Harga'];
    $jumlah = $_POST['Jumlah'];

    // Buat query SQL untuk menambahkan produk ke database
    $sql = "INSERT INTO produk (NamaProduk, Harga, Jumlah) VALUES ('$namaProduk', '$harga', '$jumlah')";

    // Eksekusi query dan periksa apakah berhasil
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Produk berhasil ditambahkan!");
                window.location.href="../tampilan/index.php";
                </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
}
?>
