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


        header("Location: Admin/FindAsset.php");
        exit();
    } else {
        echo "Đăng nhập thất bại";
    }
?>