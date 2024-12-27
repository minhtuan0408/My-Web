<?php
    session_start();  
    if (!isset($_SESSION['Username'])) {
        header("Location: ../login.php");
        exit();  
    }else if ($_SESSION['role'] == 'user'){
        echo "<script>alert('Bạn không có quyền truy cập vào trang này.')</script>";
        echo "<script>window.location.href='../main.php';</script>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/admin.css">
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
                        <button type="submit" class="search-btn">🔍</button>
                    </form>
                    <div class="icon-wrapper">
                        <i class="far fa-user"></i>
                    </div>
                    <a href="../logout.php"><button class="follow-btn">Đăng xuất </button></a>
                </div>
            </div>
        </div>  
    </header>

    <main>
        <a href="AdminAdd.php">Them asset</a><br>
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
                echo "<table>
                    <caption><b>Danh sách</b></caption>
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
                    if ($row["product_id"] % 2 == 0 )
                    {
                        echo "<tr class='odd'><td>" . $row["product_id"] . "</td>";
                    }
                    else
                    {
                        echo "<tr class='even'><td>" . $row["product_id"] . "</td>";
                    }
                    echo "<td>" . $row["name"] . "</td>"
                        ."<td>" . $row["description"] . "</td>"
                        ."<td>" . $row["price"] . "</td>"
                        ."<td><a href='../Modules/Admin/DeleteAsset.php?id=" . $row["product_id"] . "' onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\">Xóa</a></td>"
                        ."<td><a href='EditAsset.php?id=" . $row["product_id"] . "'>Sửa</a></td></tr>";
                }
                echo "</table>";
            }
            else {
                echo "Không có vật phẩm";
            }
        ?>

        <?php
            $sql_orders = "SELECT * FROM orders";
            $result_orders = $conn->query($sql_orders);

            if ($result_orders->num_rows > 0) 
            { 
                echo "<table>
                    <caption><b>Danh sách đơn hàng</b></caption>
                    <tr>
                        <th>Mã Đơn</th>
                        <th>Tên</th>
                        <th>Ngày Đặt</th>
                        <th>Tổng Tiền</th>
                        <th>Chi Tiết</th>
                    </tr>";
                
                while($row = $result_orders->fetch_assoc())
                { 
                    echo "<tr>
                            <td>" . $row["order_id"] . "</td>
                            <td>" . $row["users_name"] . "</td>
                            <td>" . $row["order_date"] . "</td>
                            <td>" . number_format($row["order_price"]) . " VND</td>
                            <td><a href='../Modules/Admin/mail-backend.php?id=" . $row["order_id"] . "'>Check Order</a></td>
                        </tr>";
                }
                echo "</table>";
            }
            else {
                echo "Không có đơn hàng nào.";
            }
        ?>
    
    </main>


</html>
