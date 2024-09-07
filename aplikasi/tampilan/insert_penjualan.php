<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'aplikasi');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if POST data is set
if (isset($_POST['TanggalPenjualan'], $_POST['TotalHarga'], $_POST['iduser'], $_POST['JumlahProduk'])) {
    // Get and sanitize the form data
    $tanggalPenjualan = $conn->real_escape_string($_POST['TanggalPenjualan']);
    $totalHarga = $conn->real_escape_string($_POST['TotalHarga']);
    $iduser = (int)$_POST['iduser']; // Cast to integer
    $jumlahProduk = (int)$_POST['JumlahProduk']; // Cast to integer
    $produkID = (int)$_POST['ProdukID'];

    // Prepare the SQL query to insert sales data into the Penjualan table
    $sql = "INSERT INTO Penjualan (TanggalPenjualan, TotalHarga, iduser, JumlahProduk, ProdukID) 
            VALUES ('$tanggalPenjualan', '$totalHarga', '$iduser', '$jumlahProduk', '$produkID')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // If successful, redirect to the sales page
        header('Location: ../tampilan/view_penjualan.php');
        exit();
    } else {
        // If there is an error, display the error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Please fill all the required fields.";
}

// Close the connection
$conn->close();
?>
