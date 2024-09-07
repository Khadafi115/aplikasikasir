<?php
include("../inc.php");

// Check if form is submitted
print('luar');
if ($_POST['submit']) {
    print('masukkk');
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("New account created successfully!");
            window.location.href="../login.php";
            </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close the connection
    $conn->close();

    print('tess');
}
?>