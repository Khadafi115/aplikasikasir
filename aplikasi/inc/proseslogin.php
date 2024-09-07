<?php
include("../inc.php");
session_start();

//Login
if (isset($_POST['login'])) {
    // Initiate variable
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user was found
    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start session
            $_SESSION['login'] = 'True';
            echo '<script>alert("Anda Berhasil Login");
            window.location.href="../tampilan/index.php";
            </script>'; // Make sure to exit after redirect
        } else {
            // Password is incorrect
            echo '<script>alert("Username atau Password salah");
            window.location.href="login.php";
            </script>';
        }
    } else {
        // Username not found
        echo '<script>alert("Username atau Password salah");
        window.location.href="login.php";
        </script>';
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>