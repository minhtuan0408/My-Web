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
    <link rel="stylesheet" href="main.css">  
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
                    <input type="text" placeholder="Search">
                    <button class="search-btn">🔍</button>
                </div>
                <div class="nav-right">
                    <img src="profile.png" alt="Profile" class="profile">
                    <a href="logout.php">Log out</a>
                </div>
            </div>
        </div>  
    </header>

    <h2>Tìm kiếm vật phẩm</h2>
    <form method="GET" action="">
        <label for="name">Tên Vật Phẩm:</label>
        <input type="text" id="name" name="name"><br><br>
        <button type="submit">Tìm kiếm</button>
    </form>

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

            if ($result->num_rows > 0) 
            { 
                echo"<table border='1' width=50% align='center'>
                    <caption> <b> Các vật phẩm đang treo</caption>
                <tr>
                    <th>ID</th>
                    <th>Tên vật phẩm</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
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
                        ."<td>" .$row["price"]."</td>";
                    }
                }
            else {
                echo "None";
            }
        ?>
    </main>

    


    <footer>

    </footer>
</body>
</html>
