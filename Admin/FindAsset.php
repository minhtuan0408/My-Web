<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm kiếm vật phẩm</title>
</head>
<body>
    <a href="../main.php">Trang Chủ</a>
    <a href="AddAsset.php">Thêm vật phẩm</a><br>
    <h2>Tìm kiếm vật phẩm</h2>
    <form method="GET" action="">
        <label for="name">Tên Vật Phẩm:</label>
        <input type="text" id="name" name="name"><br><br>
        <button type="submit">Tìm kiếm</button>
    </form>


    <main>
        <?php
            include '../connect.php';

            $name = isset($_GET['name']) ? $_GET['name'] : '';

            if (!empty($name)) {
                $sql = "SELECT * FROM products WHERE name LIKE '%$name%'";
            } else {
                $sql = "SELECT * FROM products";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            { 
                echo"<table border='1' width=50% align='center'>
                    <caption> <b> Danh sách </caption>
                <tr>
                    <th>ID</th>
                    <th>Tên vật phẩm</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>";
                
                while($row = $result->fetch_assoc())
                { 
                    if ($row["product_id"]%2==0)
                    {
                    echo "<tr class='odd'><td>".$row["product_id"]. "</td>";
                    }
                    else
                    {
                        echo "<tr class='even'><td>" .$row["product_id"]. "</td>";
                    }
                    echo "<td>" .$row["name"]. "</td>"
                        ."<td>" .$row["description"]. "</td>"
                        ."<td>" .$row["price"]."</td>"
                        ."<td><a href='deleteAsset.php?id=" . $row["product_id"] . "' onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\">Xóa</a></td>"
                        ."<td><a href='editAsset.php?id=" . $row["product_id"] . "'>Sửa</a></td>";
                    }
                }
            else {
                echo "Không có vật phẩm";
            }
        ?>

</body>
</html>
