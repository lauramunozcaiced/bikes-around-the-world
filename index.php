<?php
  //Author: Laura Muñoz

    include './components/header.php';
    $dataBaseProducts = verCatalogo();
    
?>
<div class="row h-100 d-flex align-items-center">
    <?php if($messageCar != ""){ ?>
    <div class="alert alert-success">
        <p><?= $messageCar; ?></p>
        <a href="car.php">Ir al carrito</a>
    </div>

    <?php } ?>
    <!-- Carouse Example -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <?php 
              foreach($dataBaseProducts as $dataBaseProduct){
            ?>
            <div class="carousel-item  <?php if($dataBaseProduct['id'] == 1){echo 'active';}?>">
                <div class="bike" style="background-image:url('<?= $dataBaseProduct['img'] ?>');"></div>
                <div class="carousel-item__info">
                    <h4>only $<?= $dataBaseProduct['price'] ?> USD</h4>
                    <button onclick="buyProduct(<?= $dataBaseProduct['id']; ?>)" data-toggle="modal"
                        data-target="#staticBackdrop">BUY NOW</button>
                </div>
            </div>
            <?php
              }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalshow">
                    wait...
                </div>
            </div>
        </div>
    </div>
    <script src="./js/main.js"></script>
    <!-- End -->
</div>
<?php
    include './components/footer.php';
?>