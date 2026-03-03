<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-light-grey">
    <div class="w3-container w3-blue w3-padding-16">
        <h2>Chỉnh sửa mật khẩu</h2>
    </div>
    <form action="xu_ly_sua_mk.php" method="post" class="w3-container w3-white w3-card-4 w3-margin w3-padding-16">
        <p>
            <label>Mật khẩu cũ:</label>
            <input class="w3-input w3-border" type="password" name="old_pass" required>
        </p>
        <p>
            <label>Mật khẩu mới:</label>
            <input class="w3-input w3-border" type="password" name="new_pass" required>
        </p>
        <p>
            <label>Nhập lại mật khẩu mới:</label>
            <input class="w3-input w3-border" type="password" name="confirm_pass" required>
        </p>
        <button type="submit" class="w3-button w3-blue w3-round">Cập nhật mật khẩu</button>
        <a href="homepage.php" class="w3-button w3-gray w3-round">Quay lại</a>
    </form>
</body>
</html>