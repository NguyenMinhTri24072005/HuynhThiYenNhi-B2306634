<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$major_id = $_POST['major_id'];
$date = date_create($_POST["birth"]);
$formatted_date = $date->format('Y-m-d');

$sql = "UPDATE student SET 
            fullname = '$fullname', 
            email = '$email', 
            birthday = '$formatted_date', 
            major_id = '$major_id' 
        WHERE ID = '$id'";

if ($conn->query($sql) === TRUE) {
    header('Location: taidulieu_bang1.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close(); // Đóng kết nối [cite: 270]
?>