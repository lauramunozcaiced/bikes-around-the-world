<?php 
require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script async src="./js/main.js"></script>
</head>
<body>
<header>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="logo">
                        <div class="logo__img">

                        </div>
                        <div class="logo__text">
                        <h6>Bikes around</h6>
                        <h6>the world</h6>
                        </div>
                        
                    </div>
                </div>
                <div class="col-6">
                    
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="container">
        <div class="container-fluid">
        <section id="products">
            <?php
            $sql = "SELECT * FROM products";
            $result = $mysqli -> query($sql);
            while($row = $result -> fetch_array(MYSQLI_ASSOC)){
              ?>
                <div class="row">
                    <div class="col-12">
                    <div class="<?= $row["avalaible"] ?>">
                    <img src="<?= $row["img"] ?>" alt="Smiley face" width="300">
                    <div class="product__information">
                        <div class="product__information-top">
                            <h2><?= $row["name"] ?></h2>
                            <h2>$<?= $row["price"] ?></h2>
                        </div>
                        <p><?= $row["description"] ?></p>
                       
                    </div>
                    <button onclick="addCart('<?= $row['img'] ?>','<?= $row['name'] ?>','<?= $row['id'] ?>')">BUY</button>
                    </div>
                </div>
              <?php  
            }
            ?>
            
        </section>
        <section id="payment">
            <?php
            if(isset($_POST['buy'])) {
            ?>
            <div class="row">
                <div class="col-6">
                    <img src="<?= $_POST['img'] ?>" alt="Smiley face" width="300">
                    <h2><?= $_POST['nm'] ?></h2>
                </div>
                <div class="col-6">
                    <form action="" method="post">
                        <input type="text" name="fname" placeholder="First name" required>
                        <input type="text" name="lname" placeholder="Last name" required>
                        <input type="text" name="email" placeholder="Email" required>
                        <select name="type_card">
                            <option value="Visa" selected>Visa</option>
                        </select>
                        <input type="text" name="card_number" placeholder="Card number" required>
                        <input type="submit" name="checkout" value="checkout">
                    </form>
                </div>
            </div>
            <?php
            }
            ?>
        </section>
        </div>
    </div>
</main>


</body>
</html>