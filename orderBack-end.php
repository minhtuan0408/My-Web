<?php
    include "connect.php";

    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $sql = "INSERT INTO orders (user_id, product_id) VALUES('$user_id')";

        if ($conn->query($sql) === TRUE){

            echo"order thành công <br>";
            echo "<a href='main.php'>Quay lại trang chính</a>";
        }else{
            echo "Lỗi, thử lại";
        }
    }
?>