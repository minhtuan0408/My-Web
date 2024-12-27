<?php   
    require '../connect.php';
    session_start(); 

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Đăng nhập thành công! ";

        $user = $result->fetch_assoc();
        $_SESSION['Username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        if ($user['role'] == 'user')
        {
            header("Location: ../main.php");
            exit();
        }elseif($user['role'] == 'admin'){
            header("Location: ../Admin/Admin.php");
            exit();
        }
        else{
            echo "Tài khoản bạn bị lỗi, vui lòng đăng kí tài khoản mới";
        }

    } else {
        echo "Đăng nhập thất bại. Vui lòng kiểm tra lại tên đăng nhập và mật khẩu.";
    }
?>