<?php
    include '../connect.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM products WHERE product_id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
        } else {
            echo "Vật phẩm không tồn tại!";
            exit;
        }
    } else {
        echo "Không tìm thấy ID!";
        exit;
    }


?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sản Phẩm</title>    
    <link rel="stylesheet" href="../css/Edit.css">
</head>
<body>
    <a href="Admin.php" class="find-link">Tìm kiếm vật phẩm</a>
    <div class="main-content">
        <h2 class="main-title">Sửa vật phẩm</h2>
        <form action="" method="post" class="asset-form">

            <label for="name" class="form-label">Tên Vật Phẩm:</label>
            <input type="text" id="name" name="ten" class="form-input" required><br><br>

            <label for="description" class="form-label">Mô Tả:</label>
            <textarea id="description" name="mota" rows="4" cols="50" class="form-textarea"></textarea><br><br>
            
            <label for="price" class="form-label">Giá Tiền:</label>
            <input type="number" id="price" name="gia" class="form-input" required><br><br>

            <label for="category" class="form-label">Loại vật phẩm</label>
            <select name="theloai" id="category" class="form-select" required>
                <option value="none">None</option>
                <option value="Picture">Picture</option>
                <option value="Sound">Sound</option>
                <option value="Other">Other</option>
            </select><br>

            <label for="link" class="form-label">Gửi link ảnh</label>
            <input type="text" id="name" name="link" class="form-input"><br>

            <button type="submit" class="form-submit-btn">Sửa</button><br>
            
        </form>
    </div>
</body>
</html>


<?php
    include "../connect.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ten = $_POST['ten'];
        $mota = $_POST['mota'];
        $gia = $_POST['gia'];
        $theloai = $_POST['theloai'];
        $link = $_POST['link'];
        
        $update = "UPDATE products SET name = '$ten', description = '$mota', price = '$gia' WHERE product_id = $id";

        if ($conn->query($update) === TRUE) {
            echo "Cập nhật thành công!";
        } else {
            echo "Lỗi khi cập nhật: " . $conn->error;
        }
    } 
    
?>