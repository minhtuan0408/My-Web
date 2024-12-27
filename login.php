<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <h1>Đăng Nhập</h1>
        <form method="POST" action="Modules/loginBack-end.php">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Đăng Nhập</button>
        </form>
        <a href="Khách hàng/register.php">Đăng Ký</a> 

    </div>  
</body>
</html>
