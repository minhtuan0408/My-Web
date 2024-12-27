<?php
    session_start();  
    if (!isset($_SESSION['Username'])) {
        header("Location: login.php");
        exit();  
    }else if ($_SESSION['role'] == 'user'){
        echo "<script>alert('Bạn không có quyền truy cập vào trang này.')</script>";
        echo "<script>window.location.href='main.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/adminAdd.css">
</head>
<body>
    <header> 
        <div class="container">     
            <div class="header-wrapper">
                <div class="nav-left">
                    <a href="#browse"><img src="../Asset/G.png" style="height: 40px;"></a>
                    <div>
                        <a href="../main.php">Trang chủ</a>
                    </div>
                    <div>
                        <a href="">My product</a>
                    </div>
                    <div>
                        <a href="Admin.php">Admin</a>
                    </div>
                    <div>
                        <a href="https://github.com/minhtuan0408">Git hub</a>
                    </div>
                </div>  
                <div class="navbar-center">
                    <form action="" method="GET">
                        <input type="text" name ="name" placeholder="Search...">
                        <button type="submit">🔍</button>
                    </form>
                    <div class="icon-wrapper">
                        <i class="far fa-user"></i>
                    </div>
                    <a href="../Modules/logout.php"><button class="follow-btn">Đăng xuất </button></a>
                </div>
            </div>
        </div>  
    </header>

    <main class="main-content">
        <a href="Admin.php">Tìm kiếm</a>
    
        <h2 class="main-title">Thêm Vật Phẩm</h2>

        <form action="../Modules/Admin/AddAssetBack-end.php" method="POST" class="asset-form">
            <label for="name" class="form-label">Tên Vật Phẩm:</label>
            <input type="text" class="form-input" name="ten" required><br><br>

            <label for="description" class="form-label">Mô Tả:</label>
            <textarea class="form-textarea" name="mota" rows="4" cols="50"></textarea><br><br>

            <label for="price" class="form-label">Giá Tiền:</label>
            <input type="number" class="form-input" name="gia" required><br><br>

            <label for="category" class="form-label">Loại vật phẩm:</label>
            <select name="theloai" class="form-select" required>
                <option value="none">None</option>
                <option value="Picture">Picture</option>
                <option value="Sound">Sound</option>
                <option value="Other">Other</option>
            </select><br><br>

            <label for="link" class="form-label">Link Hình Ảnh:</label>
            <input type="text" class="form-input" name="link"><br><br>

            <button type="submit" class="form-submit-btn">Thêm Vật Phẩm</button>
        </form>
    </main> 
</html>
