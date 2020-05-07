<?php
include './components/header.php';
?>
<div class="toPay">
<?php
if($_POST){
    saveOrder( $_POST['email'] , $_POST['mobile'] , json_encode($_SESSION['car']) , ($_POST['fname'].' '.$_POST['lname']) , $_SESSION['amount'], session_id());
    ?>
<div class="row">
    <div class="col-12">
        <div class="gotopay">
            <h4>The last step</h4>
            <div class="gotopay__information">
                <p>You are about to pay: </p>
                <h3>$<?= $_SESSION['amount']; ?> USD</h3>
                <p>Once the payment is approved, we will send you a confirmation message.</p>
                    
            </div>
        </div>
        <div id="paypal-button-container"></div>
    </div>
</div>

<script>
paypal.Button.render({
    env: 'sandbox',
    style: {
        label: 'checkout',
        size: 'responsive',
        shape: 'pill',
        color: 'gold'
    },

    client: {
        sandbox: 'SANDBOX_KEY',
        production: 'PRODUCTION_KEY'
    },

    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [{
                    amount: {
                        total: '<?= $_SESSION['amount']?>',
                        currency: 'USD'
                    },
                    description: "Buy in Bikes around the world <?= number_format($_SESSION['amount']) ?> ",
                    custom: "<?= openssl_encrypt(session_id(),COD,KEY); ?>"
                }]
            }
        });
    },

    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function() {
            console.log(data);
            window.location = "verify.php?paymentToken=" + data.paymentToken + "&paymentID=" +
                data.paymentID;
        });
    }

}, '#paypal-button-container');
</script>
<?php
} else{
?>
<div class="row">
    <div class="col-12 wow">
        <h1>Wow, How are you here?</h1>
        <a href="index.php">Go to shop</a>
        
        
    </div>
</div>

<?php
}
          
?>
</div>