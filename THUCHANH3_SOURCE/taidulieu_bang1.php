<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT student.*, major.name_major 
        FROM student 
        LEFT JOIN major ON student.major_id = major.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $result_all = $result->fetch_all(MYSQLI_ASSOC);
?>
<h1>Bảng dữ liệu sinh viên kèm chuyên ngành</h1>
<table border=1>
    <tr>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Ngày sinh</th>
        <th>Mã chuyên ngành</th>
        <th>Tên chuyên ngành</th>
        <th colspan="2">Hành động</th>
    </tr>
<?php 
    foreach ($result_all as $row) {
        $date = date_create($row['Birthday']);
        echo "<tr>";
        echo "<td>" . $row["id"]. "</td>";
        echo "<td>" . $row["fullname"]. "</td>";
        echo "<td>" . $row["email"]. "</td>";
        echo "<td>" . $date->format('d-m-Y') . "</td>";
        
        echo "<td>" . ($row["major_id"] ? $row["major_id"] : "N/A") . "</td>";
        echo "<td>" . ($row["name_major"] ? $row["name_major"] : "Chưa cập nhật") . "</td>";
        
        echo "<td>";
?>
        <form method="post" action="xoa.php"> 
            <input type="submit" name="action" value="xoa"/>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        </form>
<?php
        echo "</td><td>";
?>
        <form method="post" action="form_sua.php"> 
            <input type="submit" name="action" value="sua"/>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        </form>
<?php
        echo "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 kết quả trả về";
}
$conn->close();
?>