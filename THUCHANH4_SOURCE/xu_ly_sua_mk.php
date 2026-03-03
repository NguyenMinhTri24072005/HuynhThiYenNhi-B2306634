<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$id = $_SESSION['id']; 
$old_pass = md5($_POST['old_pass']); 
$new_pass = $_POST['new_pass'];
$confirm_pass = $_POST['confirm_pass'];

$sql_check = "SELECT password FROM customers WHERE id = '$id'";
$result = $conn->query($sql_check);
$row = $result->fetch_assoc();
$current_db_pass = $row['password'];

if ($old_pass !== $current_db_pass) {
    echo "Lỗi: Mật khẩu cũ không chính xác!";
} elseif ($new_pass !== $confirm_pass) {
    echo "Lỗi: Hai ô mật khẩu mới không khớp nhau!";
} elseif (md5($new_pass) === $current_db_pass) {
    echo "Lỗi: Mật khẩu mới không được trùng với mật khẩu cũ!";
} else {
    $hashed_new_pass = md5($new_pass);
    $sql_update = "UPDATE customers SET password = '$hashed_new_pass' WHERE id = '$id'"; 
    
    if ($conn->query($sql_update) === TRUE) {
        echo "Cập nhật mật khẩu thành công! Vui lòng đăng nhập lại.";
        session_destroy(); 
        header('Refresh: 2; url=login.php');
    } else {
        echo "Lỗi khi cập nhật: " . $conn->error;
    }
}

$conn->close();
?>