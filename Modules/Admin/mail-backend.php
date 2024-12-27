<?php
include '../../connect.php'; 

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    $sql = "SELECT orders.order_id, orders.users_name, orders.order_price, 
                users.username, users.email
                FROM orders
                JOIN users ON orders.users_name = users.username
                WHERE orders.order_id = $order_id;  ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();

        $to = $order['email'];

        $subject = "Chi tiết đơn hàng #" . $order['order_id'];
        $message = "Chào " . $order['users_name'] . ",\n\n"
                 . "Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Đây là thông tin đơn hàng của bạn:\n\n"
                 . "Mã Đơn: " . $order['order_id'] . "\n"
                 . "Tổng Tiền: " . number_format($order['order_price']) . " VND\n\n"
                 . "Chi tiết vui lòng truy cập: https://yourwebsite.com/order/" . $order['order_id'] . "\n\n"
                 . "Trân trọng,\nCửa hàng của chúng tôi";
        $headers = "From: your_email@example.com";

        // Gửi email
        if (mail($to, $subject, $message, $headers)) {
            echo "Email đã gửi thành công tới " . $to;
        } else {
            echo "Gửi email thất bại.";
        }
    } else {
        echo "Không tìm thấy thông tin đơn hàng.";
    }
} else {
    echo "Không có mã đơn hàng.";
}

$conn->close();
?>
