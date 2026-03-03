<?php
$conn = new mysqli("localhost", "root", "", "qlsv");
$id = $_POST['id']; 

$sql = "DELETE FROM major WHERE id='$id'"; 

if ($conn->query($sql) == TRUE) {
    header('Location: major_index.php');
} else { echo "Lỗi khi xóa: " . $conn->error; }
$conn->close();
?>