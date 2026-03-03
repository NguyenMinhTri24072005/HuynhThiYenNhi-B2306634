<?php
session_start(); // Phải khởi tạo để có quyền xóa 

// 1. Xóa tất cả các biến Session đã gán 
session_unset(); 

// 2. Hủy bỏ phiên làm việc trên máy chủ 
session_destroy(); 

// 3. Xóa Cookie cũ nếu còn sót lại (để an toàn tuyệt đối) 
if (isset($_COOKIE['user'])) {
    setcookie('user', '', time() - 3600, '/');
}

// 4. Đẩy người dùng về trang đăng nhập
header('Location: login.php');
exit();
?>