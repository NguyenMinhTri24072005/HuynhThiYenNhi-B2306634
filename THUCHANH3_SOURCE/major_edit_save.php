<?php
$conn = new mysqli("localhost", "root", "", "qlsv");
$id = $_POST['id'];
$name = $_POST['name_major'];

$sql = "UPDATE major SET name_major = '$name' WHERE id = '$id'"; 

if ($conn->query($sql) == TRUE) {
    header('Location: major_index.php'); 
} else { echo "Error: " . $conn->error; }
$conn->close();
?>