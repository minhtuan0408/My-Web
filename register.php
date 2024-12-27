<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <div class="register-container">
        <h2>Đăng Ký Tài Khoản</h2>
        <div class="login-container">
    
        <form method="post" action="registerBack-end.php">
            <label for="email">Nhập gmail : </label>
            <input type="gmail" name="gmail" id="email" required><br><br>
            <label for="username">Tên tài khoản:</label>
            <input type="text" name="username" id="username" required><br><br>
            <label for="username"> Mật khẩu: </label>
            <input type="password" name="password" id="password" required><br><br>
            <button type="submit">Đăng kí</button>


            <a href="../login.php">Đăng nhập</a>
        </form>
        </div>
    </div>
</body>
</html>
