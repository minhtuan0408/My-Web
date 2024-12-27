<?php
    session_start();  
    if (!isset($_SESSION['Username'])) {
        header("Location: login.php");
        exit();  
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="css/show.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <header> 
        <div class="container">     
            <div class="header-wrapper">
                <div class="nav-left">
                    <a href="#browse"><img src="Asset/G.png" style="height: 40px;"></a>
                   
                    <div>
                        <a href="#browse">Trang chủ</a>
                    </div>
                    <div>
                        <a href="">My product</a>
                    </div>
                    <div>
                        <a href="Admin/Admin.php">Admin</a>
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
                    <a href="Modules/logout.php"><button class="follow-btn">Đăng xuất </button></a>
                </div>
            </div>
        </div>  
    </header>


    <main>
        
        <div class="BG">
            <div class="hot-new">
                <h1>What're we have !!!?</h1>
            </div>
            <div class="grid-intro">
                <div>
                    <a href=""><img src="Asset/art-free1.png" width="250px" height="250px" ></a>
                    <a href="">Free Asset</a>
                </div>
                <div>
                    <img src="Asset/sound.png" width="250px" height="250px">
                    <a href="">Free Sound</a>
                </div>
                <div>
                    
                    <img src="Asset/sound.png" width="250px" height="250px">
                    <a href="">Free Project</a>
                </div>
            </div>
        </div>



        <?php
        include 'connect.php';

        $name = isset($_GET['name']) ? $_GET['name'] : '';

        if (!empty($name)) {
            $sql = "SELECT * FROM products WHERE name LIKE '%$name%'";
        } else {
            $sql = "SELECT * FROM products";
        }
        $result = $conn->query($sql);

        if ($result->num_rows > 0) { 
            $cnt = 0;
            while($row = $result->fetch_assoc()) { 
                if ($cnt % 4 == 0){
                    if ($cnt > 0){
                        echo "</div>";
                    }
                    echo "<div class='item-main-show-container'>";
                }
                echo "<div class='product-item'>
                        <h3 class='title-item'>{$row['name']}</h3>
                        <img src='{$row['link']}' class='fixed-size'><br>
                        <p class='product-description'>{$row['description']}</p>
                        <p class='product-price'>Price: {$row['price']} VND</p>
                        <form method='post' action='orderBack-end.php'>
                            <input type='hidden' name='product_id' value='{$row['product_id']}'>
                            <input type='hidden' name='user_name' value='{$_SESSION['Username']}'>
                            <button type='submit'>Order</button>
                        </form>
                      </div>";
                $cnt++;
            }
            echo "</div>"; // đóng div cuoois
        } else {
            echo "Không tìm thấy thông tin Asset";
        }
    ?>



    </main>

    

    <footer>
    
    </footer>
</body>
</html>
