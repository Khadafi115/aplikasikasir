<?php

session_start();

//Koneksi
$conn = mysqli_connect('localhost','root','','aplikasi');



//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





?>