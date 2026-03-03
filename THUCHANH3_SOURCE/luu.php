<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$date = date_create($_POST["birth"]);

$major_id = $_POST["major_id"];

$sql = "INSERT INTO student (fullname, email, birthday, major_id) 
        VALUES ('".$_POST["name"] ."', '".$_POST["email"] ."', '".$date->format('Y-m-d') ."', '$major_id')";

if ($conn->query($sql) == TRUE) {
    echo "Thêm sinh viên và chuyên ngành thành công!";
    
    header('Location: taidulieu_bang1.php');
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>