<?php
require "connect.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO admins(username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Đăng ký thành công! </br> 
            <a href='main.html'>Quay lại trang chủ</a>";
    } else {
        echo "Xin vui lòng thử lại sau " . $conn->error;
    }
?>
