<?php
require "../connect.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $gmail = $_POST['gmail'];

    $sql = "INSERT INTO users(username, password, email) VALUES ('$username', '$password', '$gmail')";

    if ($conn->query($sql) === TRUE) {
        echo "Đăng ký thành công! </br> 
            <a href='../main.php'>Quay lại trang chủ</a>";
    } else {
        echo "Xin vui lòng thử lại sau " . $conn->error;
    }
?>
