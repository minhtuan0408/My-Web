<?php
include '../connect.php';


$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($product_id > 0) {
    $sql = "DELETE FROM products WHERE product_id = $product_id";

    if ($conn->query($sql) === TRUE) {
        echo "Xóa sản phẩm thành công!";
    } else {
        echo "Lỗi khi xóa: " . $conn->error;
    }
} else {
    echo "ID không hợp lệ.";
}


header("Location: findAsset.php");
exit();
?>
