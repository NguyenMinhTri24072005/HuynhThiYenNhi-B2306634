<!DOCTYPE HTML>
<html>
<body>
    <h2>Thêm sinh viên mới</h2>
    <form action="luu.php" method="post">
        Name: <input type="text" name="name"><br><br>
        E-mail: <input type="text" name="email"><br><br>
        Birthday: <input type="date" name="birth"><br><br>

        Chuyên ngành: 
        <select name="major_id">
            <option value="">-- Chọn chuyên ngành --</option>
            <?php
            $conn = new mysqli("localhost", "root", "", "qlsv");
            $sql = "SELECT * FROM major";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['name_major'] . "</option>";
            }
            $conn->close();
            ?>
        </select>
        <br><br>
        <input type="submit" value="Lưu sinh viên">
    </form>
</body>
</html>