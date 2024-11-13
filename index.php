<?php
$host = 'localhost';
$dbUsername = 'root'; 
$dbPassword = ''; 
$dbName = 'react'; 

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (strlen($password) < 8) {
        echo "<script>alert('Password minimal 8 karakter!');</script>";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $checkEmail = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($checkEmail);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Email sudah digunakan. Silakan gunakan email lain!');</script>";
        } else {
            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                echo "<script>alert('Akun berhasil dibuat!');</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan saat membuat akun!');</script>";
            }
        }
        $stmt->close();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            header("Location: login.php");
            exit();
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!');</script>";
    }
    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="stylepoints/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="container">
    <div class="curved-shape"></div>
    <div class="curved-shape"></div>
    <div class="curved-shape2"></div>
    <div class="form-box login">
        <h2 class="animation" style="--D:0; --S:21">Log in</h2>
        <form action="" method="POST">
            <div class="input-box animation" style="--D:1; --S:22">
                <input type="text" name="username" required>
                <label for="">Username</label>
                <i class='bx bxs-user' style='color:#ffffff'></i>
            </div>
            <div class="input-box animation" style="--D:2; --S:23">
                <input type="password" name="password" required>
                <label for="">Password</label>
                <i class='bx bxs-key' style='color:#ffffff'></i>
            </div>
            <div class="input-box animation" style="--D:3; --S:24">
                <button class="btn" type="submit" name="login">Login</button>
            </div>
            <div class="regis-link animation" style="--D:4; --S:25">
                <p>Don't have an account? <a href="#" class="signuplink">Sign Up</a></p>
            </div>
        </form>
    </div>

    <div class="info-content login">
        <h2 class="animation" style="--D:0; --S:20">Selamat Datang</h2>
        <p class="animation" style="--D:1; --S:21">Log masuk ke akun anda!</p>
    </div>

    <div class="form-box register">
        <h2 class="animation" style="--li:17; --S:0">Sign Up</h2>
        <form action="" method="POST">
            <div class="input-box animation" style="--li:18; --S:1">
                <input type="text" name="username" required>
                <label for="">Username</label>
                <i class='bx bxs-user' style='color:#ffffff'></i>
            </div>
            <div class="input-box animation" style="--li:19; --S:2">
                <input type="email" name="email" required>
                <label for="">Email</label>
                <i class='bx bx-envelope' style='color= #ffffff'></i>
            </div>
            <div class="input-box animation" style="--li:20; --S:3">
                <input type="password" name="password" required pattern=".{8,}" title="Masukkan password minimal 8 karakter">
                <label for="">Password</label>
                <i class='bx bxs-key' style='color:#ffffff'></i>
            </div>
            <div class="input-box animation" style="--li:21; --S:4">
                <button class="btn" type="submit" name="signup">Sign Up</button>
            </div>
            <div class="regis-link animation" style="--li:22; --S:5">
                <p>Already have an account? <a href="#" class="signinlink">Sign In</a></p>
            </div>
        </form>
    </div>

    <div class="info-content register">
        <h2 class="animation" style="--li:17; --S:0;">Pertama Kali Disini?</h2>
        <p class="animation" style="--li:18; --S:1;">Silahkan buat akun anda!</p>
    </div>
</div>

<script src="index.js"></script>
</body>
</html>
