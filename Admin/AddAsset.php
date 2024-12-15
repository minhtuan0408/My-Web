<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sản Phẩm</title>
</head>
    <body>
        <h2>Thêm vật phẩm</h2>
        <form action="AddAssetBack-end.php" method="post">

            <label for="name">Tên Vật Phẩm:</label>
            <input type="text" id="name" name="ten" required><br><br>

            <!-- dùng thừ label kiểu description -->
            <label for="description">Mô Tả:</label>
            <textarea id="description" name="mota" rows="4" cols="50"></textarea><br><br>
            
            <label for="price">Giá Tiền:</label>
            <input type="number" id="price" name="gia" required><br><br>

            <label for="category">Loại vật phẩm</label>
            <select name="theloai" id="category" required>
                <option value="none">None</option>
                <option value="Picture">Picture</option>
                <option value="Sound">Sound</option>
                <option value="Other">Other</option>
            </select><br>
            <button type="submit">Thêm Vật Phẩm</button><br>
            <a href="FindAsset.php">Tìm kiếm các vật phẩm</a>
        </form>
        
    </body>
</html>
