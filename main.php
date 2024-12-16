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
    <link rel="stylesheet" href="css/main.css">  
</head>
<body>
    <header> 
        <div class="container">     
            <div class="header-wrapper">
                <div class="nav-left">
                    <img src="Asset/G.png" height="35px" >
                    <a href="#browse">Browse</a>
                    <a href="">Asset</a>
                    <a href="">My product</a>
                    <a href="MyGit">Git hub</a>
                </div>  
                
                <div class="navbar-center">
                    <!-- <input type="text" placeholder="Search">
                    <button class="search-btn">🔍</button> -->

                    <form method="GET" action="">
                        <input type="text" id="name" name="name" placeholder="Search">
                        <button type="submit">🔍</button>
                    </form>
                </div>
                <div class="nav-right">
                    <img src="profile.png" alt="Profile" class="profile">
                    <a href="logout.php">Log out</a>
                </div>
            </div>
        </div>  
    </header>



    <main>
        <?php
            include 'connect.php';

            $name = isset($_GET['name']) ? $_GET['name'] : '';

            if (!empty($name)) {
                $sql = "SELECT * FROM products WHERE name LIKE '%$name%'";
            } else {
                $sql = "SELECT * FROM products";
            }
            $result = $conn->query($sql);


            if ( $result->num_rows > 0) 
            { 
                $cnt = 0;
                while($row = $result->fetch_assoc())
                { 
                    if ($cnt % 4 == 0){
                        if ($cnt >0){
                            echo "</div>";
                        }
                        echo "<div class='item-main-show-container'>";
                    }
                    echo "<div>
                            <h3 class='title-item'>{$row['name']}</h3>
                            <img src='{$row['link']}' class='fixed-size'><br>
                            <form method='post' action='orderBack-end.php'>
                                <input type='hidden' name='product_id' value='{$row['product_id']}'>
                                <input type='hidden' name='user_id' value='{$_SESSION['Username']}'>
                                
                                <button type='submit'>Order</button>
                            </form>
                        </div>
                        ";
                    $cnt++;
                }
            }
            else {
                echo "Không tìm thấy thông tin Asset";
            }
        ?>


    </main>

    

    <footer>

    </footer>
</body>
</html>
