<?php   
    require 'connect.php';
    session_start(); 

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Đăng nhập thành công! ";

        $user = $result->fetch_assoc();
        $_SESSION['Username'] = $user['username'];

        echo "<a href='../main.php'>Đi đến trang chủ</a>";
        header("Location: main.php");
        exit();
    } else {
        echo "Đăng nhập thất bại. Vui lòng kiểm tra lại tên đăng nhập và mật khẩu.";
    }
?>