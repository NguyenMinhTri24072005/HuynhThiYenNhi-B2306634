<?php
session_start(); // [cite: 5]
// Kiểm tra bảo mật: Nếu chưa đăng nhập, đẩy về trang login ngay lập tức
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<title>Trang chủ - Quản lý khách hàng</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
.profile-img { width: 100%; max-width: 150px; border-radius: 50%; margin-top: 10px; }
</style>
<body class="w3-content" style="max-width:1200px">

<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>
    <?php
    echo 'Chào bạn '.$_SESSION['fullname']; 
    
    // Kết nối CSDL để lấy ảnh profile
    $conn = new mysqli("localhost", "root", "", "qlbanhang");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // THAY ĐỔI 2: Dùng $_SESSION['id'] để truy vấn ảnh 
    $sql = "SELECT img_profile FROM customers WHERE id = '".$_SESSION['id']."'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Hiển thị ảnh profile từ thư mục uploads
        $img = !empty($row['img_profile']) ? $row['img_profile'] : 'default.png';
        echo '<br><img src="./uploads/'.$img.'" class="profile-img" alt="Anh profile">';
    }
    $conn->close();
    ?>
    </b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Sản phẩm</a>
    <a href="upload-img.php" class="w3-bar-item w3-button">Đổi ảnh đại diện</a>
    <a href="sua_mk.php" class="w3-bar-item w3-button">Đổi mật khẩu</a>
    <a href="thoat.php" class="w3-bar-item w3-button w3-text-red">Đăng xuất</a>
  </div>
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Liên hệ</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Bản tin</a> 
</nav>

<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px">
  <div class="w3-hide-large" style="margin-top:83px"></div>
  <header class="w3-container w3-xlarge">
    <p class="w3-right">
      <i class="fa fa-shopping-cart w3-margin-right"></i>
      <i class="fa fa-search"></i>
    </p>
  </header>

  <div class="w3-container w3-text-grey" id="jeans">
    <p>Chào mừng bạn đến với hệ thống quản lý nâng cao sử dụng PHP Session.</p>
  </div>

  <div class="w3-container w3-black w3-padding-32">
    <h1>Đăng ký</h1>
    <p>Để nhận ưu đãi đặc biệt:</p>
    <p><input class="w3-input w3-border" type="text" placeholder="Nhập e-mail" style="width:100%"></p>
    <button type="button" class="w3-button w3-red w3-margin-bottom">Gửi</button>
  </div>

  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>
</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>