<!DOCTYPE HTML>
<html>
<body>
    <h2>Thêm chuyên ngành mới</h2>
    <form action="" method="post">
        Tên chuyên ngành: <input type="text" name="name_major" required>
        <input type="submit" name="save" value="Lưu">
    </form>

    <?php
    if(isset($_POST['save'])){
        $conn = new mysqli("localhost", "root", "", "qlsv");
        $sql = "INSERT INTO major (name_major) VALUES ('".$_POST["name_major"]."')";
        if ($conn->query($sql) == TRUE) {
            header('Location: major_index.php'); 
        } else { echo "Lỗi: " . $conn->error; }
        $conn->close();
    }
    ?>
    <br><a href="major_index.php">Quay lại danh sách</a>
</body>
</html>