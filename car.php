<?php
 include './components/header.php';
?>

<h3>Car</h3>
<?php if(!empty($_SESSION['car'])){ ?>
<div class="row">
    <div class="col-sm-12 col-lg-6 ">
    <table class="table table-light">
    <tbody>
        <tr>
            <th width="40%">Description</th>
            <th width="10%" ></th>
            <th width="20%" >Price</th>
            <th width="20%" >Amount</th>
            <th width="3%"></th>
        </tr>
        <?php 
        $total = 0;
        foreach($_SESSION['car'] as $car){ ?>
        <tr>
            <td width="40%"><?= $car['name']; ?></td>
            <td width="15%" class="text-center"><?= $car['cantidad']; ?></td>
            <td width="20%" class="text-center">$<?= $car['price']; ?></td>
            <td width="20%" class="text-center">$<?= number_format($car['price']*$car['cantidad']); ?></td>
            <form method="post">
            <input type="hidden" name="id" value="<?= openssl_encrypt($car['id'],COD,KEY);?>">
            <td width="5%"><button type="submit" value="Delete" name="toAction" class="btn-delete">&times;</button></td>
            </form>
            
        </tr>
        <?php
        $total = $total + ($car['price']*$car['cantidad']);
        }
        $_SESSION['amount'] = $total;
        ?>
        <tr>
            <td colspan="2" align="right"><h3>Total</h3></td>
            <td colspan="2" align="right"><h3>$<?= number_format($total) ?> USD</h3>
               </td>
            <td></td>
        </tr>
    </tbody>
</table>
    </div>
    <div class="col-sm-12 col-lg-6">

    <form id="datatopay" action="pay.php" method="post">
                    <h6>Please complete the data to proceed with the pay.</h6>
                    <input type="text" class="form-control" name="fname"  placeholder="First name" required>
                    <input type="text" class="form-control" name="lname"  placeholder="Last name" required>
                    <input type="text"  class="form-control"  name="mobile"  placeholder="Mobile" required>
                    <input type="email"  class="form-control"  name="email"  placeholder="Email" required>
                    <button type="submit" value="Pay" name="toAction">CHECKOUT</button>
                </form>
    </div>
</div>

<?php 
} else{ 
?>
<div class="alert alert-success">
    The car is empty.
</div>
<?php } ?>
