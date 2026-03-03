<?php
$conn = new mysqli("localhost", "root", "", "qlsv"); 
if ($conn->connect_error) { die("Kết nối thất bại: " . $conn->connect_error); } 

$sql = "SELECT * FROM major";
$result = $conn->query($sql);

echo "<h1>Danh sách chuyên ngành</h1>";
echo "<a href='major_add.php'>Thêm chuyên ngành mới</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>ID</th><th>Tên chuyên ngành</th><th colspan='2'>Hành động</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["name_major"]. "</td>
                <td>
                    <form method='post' action='major_edit.php'>
                        <input type='hidden' name='id' value='".$row['id']."'>
                        <input type='submit' value='Sửa'>
                    </form>
                </td>
                <td>
                    <form method='post' action='major_xoa.php'>
                        <input type='hidden' name='id' value='".$row['id']."'>
                        <input type='submit' value='Xóa' onclick='return confirm(\"Bạn chắc chắn muốn xóa?\")'>
                    </form>
                </td>
            </tr>";
    }
    echo "</table>";
} else { echo "0 kết quả trả về"; }
$conn->close(); 
?>