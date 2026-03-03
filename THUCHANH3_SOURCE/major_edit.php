<?php
$conn = new mysqli("localhost", "root", "", "qlsv");
$id = $_POST['id'];
$result = $conn->query("SELECT * FROM major WHERE id='$id'");
$row = $result->fetch_assoc(); 
?>
<!DOCTYPE HTML>
<html>
<body>
    <h2>Chỉnh sửa chuyên ngành</h2>
    <form action="major_edit_save.php" method="post">
        ID: <input type="text" name="id" value="<?php echo $row['id'];?>" readonly><br>
        Tên chuyên ngành: <input type="text" name="name_major" value="<?php echo $row['name_major'];?>"><br>
        <input type="submit" value="Cập nhật">
    </form>
</body>
</html>