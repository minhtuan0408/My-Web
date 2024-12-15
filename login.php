<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
</head>
<body>
    <h1>Đăng Nhập</h1>
    <form method="POST" action="loginBack-end.php">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password" required><br><br>
        <button type="submit" class="btn">Đăng Nhập</button>
    </form>
    <a href="Khách hàng/register.php">Đăng Ký </a><br>
    <a href="loginAdmin.php">Admin</a>
</body>
</html>
