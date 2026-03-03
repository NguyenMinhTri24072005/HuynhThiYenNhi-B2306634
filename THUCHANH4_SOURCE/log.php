<?php
session_start(); // Khởi tạo Session - Luôn đặt ở dòng đầu tiên

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang"; // Đảm bảo đúng tên CSDL

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu và mã hóa mật khẩu MD5 để so khớp
$email = $_POST["email"];
$pass = md5($_POST["pass"]); 

// Truy vấn thông tin người dùng
$sql = "SELECT id, fullname, email FROM customers WHERE email = '$email' AND password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // LƯU VÀO SESSION THAY VÌ COOKIE
    $_SESSION['id'] = $row['id'];
    $_SESSION['fullname'] = $row['fullname'];
    $_SESSION['email'] = $row['email'];

    // Chuyển hướng đến trang chủ
    header('Location: homepage.php');
} else {
    echo "Sai tên đăng nhập hoặc mật khẩu! Đang quay lại...";
    header('Refresh: 3; url=login.php');
}

$conn->close();
?>