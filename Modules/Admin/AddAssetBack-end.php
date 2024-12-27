<?php
    require "../../connect.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["ten"];
        $description = $_POST["mota"];
        $price = $_POST["gia"];
        $category = $_POST["theloai"];
        $link = $_POST["link"];

        $sql = "INSERT INTO products (name, description, price, category, link) VALUES ('$name', '$description', '$price', '$category', '$link')";

        if ($conn->query($sql) === TRUE) {
            echo"đã thêm vật phẩm <br>";
            echo "<a href='../../Admin/AdminAdd.php'> Quay lại </a>";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
?>
