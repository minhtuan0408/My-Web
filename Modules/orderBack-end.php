<?php
include "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = intval($_POST['product_id']);
    $user_name = $_POST['user_name'];

    $sql = "INSERT INTO orders (users_name, product_id, status) 
            VALUES('$user_name', '$product_id', 'Waiting')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Order thành công!'); window.location.href='../main.php';</script>";
    } else {
        echo "<script>alert('Lỗi, vui lòng thử lại!'); window.location.href='../main.php';</script>";
    }
}
?>
