<!DOCTYPE HTML>
<html>
<?php
$conn = new mysqli("localhost", "root", "", "qlsv");
$id = $_POST['id'];
$sql_sv = "SELECT * FROM student WHERE id='$id'";
$result_sv = $conn->query($sql_sv);
$student = $result_sv->fetch_assoc();
?>
<body>
    <h2>Chỉnh sửa thông tin sinh viên</h2>
    <form action="sua.php" method="post">
        ID: <input type="text" name="id" value="<?php echo $student['id'];?>" readonly><br><br>
        Name: <input type="text" name="fullname" value="<?php echo $student['fullname'];?>"><br><br>
        E-mail: <input type="text" name="email" value="<?php echo $student['email'];?>"><br><br>
        Birthday: <input type="date" name="birth" value="<?php echo $student['Birthday'];?>"><br><br>

        Chuyên ngành:
        <select name="major_id">
            <?php
            $sql_major = "SELECT * FROM major";
            $result_major = $conn->query($sql_major);
            while($major = $result_major->fetch_assoc()) {
                // Kiểm tra nếu id chuyên ngành trùng với major_id của sinh viên
                $s = ($major['id'] == $student['major_id']) ? "selected" : "";
                echo "<option value='" . $major['id'] . "' $s>" . $major['name_major'] . "</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Cập nhật">
    </form>
</body>
<?php $conn->close(); ?>
</html>