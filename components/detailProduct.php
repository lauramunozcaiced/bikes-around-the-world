<?php
   require '../includes/db_methods.php';
   include '../functionsCar.php';

    $codProduct = $_REQUEST['cod'];
    $infoProduct = verProducto($codProduct);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form method="post">
        <div class="product__content">
            <div class="product__content-header">
                <h3><?= $infoProduct['name']; ?></h3>
                <h3>$ <?= $infoProduct['price']; ?> USD</h3>
            </div>
            <img src="<?= $infoProduct['img']; ?>" alt="">
            <div class="product__content-text">
                <p><?= $infoProduct['description']; ?></p>
                <div class="form-group">
                    <label for="cant">quantity:</label>
                    <div class="quantity">
                        <input type="number" name="cant" id="cant" value="1" required>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="price" value="<?= openssl_encrypt($infoProduct['price'],COD,KEY) ?>">
        <input type="hidden" name="title" value="<?= openssl_encrypt($infoProduct['name'],COD,KEY) ?>">
        <input type="hidden" name="id" value="<?= openssl_encrypt($infoProduct['id'],COD,KEY) ?>">
        <div class="container-addcart">
            <button class="addcart" type="submit" name="toAction" value="Add">Add to cart</button>
        </div>
    </form>
</body>
</html>