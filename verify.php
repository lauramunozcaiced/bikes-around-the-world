<?php
ob_start();
include './components/header.php';
if($_GET){
    $ClientID = 'AbdyMJGuhesKS3p6IPSng19G8hFyOQTUE5Wrbyf4k3QrzTuK4sFGMq5U_oKTr8Rjj5_ytw2LRoDihykt';
    $Secret = 'EKXyoeM4Mun8rSTYgVEMlLZchgbBNHh9tP3CnAdVELL_DPPHv4vySxMPzFXDLPAcCUx2kAAlhDg9csAa';
    
    $Login = curl_init('https://api.sandbox.paypal.com/v1/oauth2/token');
    curl_setopt($Login,CURLOPT_RETURNTRANSFER, TRUE);
    
    curl_setopt($Login, CURLOPT_USERPWD, $ClientID.":".$Secret);
    curl_setopt($Login,CURLOPT_POSTFIELDS,"grant_type=client_credentials");
    $Response = curl_exec($Login);
    
    
    $objRespuesta = json_decode($Response);
    
    $AccessToken = $objRespuesta->access_token;
    
    $Venta = curl_init('https://api.sandbox.paypal.com/v1/payments/payment/'.$_GET['paymentID']);
    curl_setopt($Venta,CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$AccessToken));
    
    curl_setopt($Venta,CURLOPT_RETURNTRANSFER, TRUE);
    
    $ResponseVenta = curl_exec($Venta);
    $objDatos = json_decode($ResponseVenta);
    
    $state = $objDatos->state;
    $email = $objDatos->payer->payer_info->email;
    $currency = $objDatos->transactions[0]->amount->currency;
    $custom = openssl_decrypt($objDatos->transactions[0]->custom,COD,KEY);
    
    
    curl_close($Venta);
    curl_close($Login);
    
    if($state == "approved"){
        if(updateOrder($state,$email,urlencode($ResponseVenta),$currency,$custom)){
            unset($_SESSION['car']);
            unset($_SESSION['amount']);
            $messagePaypal = "The pay is approved";
            $messageAditional = "In a few minutes, receive an approval email with the details of the products purchased. If you do not receive this email, you can contact us and ask for your order";
            $orderMessage= "Your order code is: ".session_id();
            $allorder = getProducts(session_id());
            $allProductOrder= json_decode($allorder[0]['ship']);
            $mensajePrueba = "";
    
            foreach($allProductOrder as $productie){
                $mensajePrueba.=  $productie->name.'  ('.$productie->cantidad.') <br>';
            }
        
            
            sendMailMessage($allorder[0]['customer_email'], $mensajePrueba);

            session_regenerate_id();
        }
        else{
            $messagePaypal = "The pay is approved";
            $messageAditional = "But there was an error, please take a screenshot of the payment contact us to send your order.";
            $orderMessage= "Your order code is: ".session_id();
            unset($_SESSION['car']);
            unset($_SESSION['amount']);
            session_regenerate_id();
        }
        
        
    
    }else{
        updateOrder($state,$email,urlencode($ResponseVenta),$currency,$custom);
        $orderMessage = "";
        $messagePaypal = "¡Upps!";
        $messageAditional = "Something was incorrect, Do you try again?";
    }
    
    ?>
    <div class="toPay">
    <div class="row">
    <div class="col-12">
        <div class="gotopay">
            <div class="gotopay__information">
                <p><?= $orderMessage; ?></p>
                <h3><?= $messagePaypal; ?></h3>
                <p><?= $messageAditional; ?></p>
                    
            </div>
        </div>
        <div class="wow" style="min-height:auto;">
        <a href="index.php">Go to shop</a>
        </div>
        
    </div>
</div>
    </div>
    
    <?php
    } else{
?>
<div class="toPay">
<div class="row">
    <div class="col-12 wow">
        <h1>Wow, How are you here?</h1>
        <a href="index.php">Go to shop</a>
    </div>
</div>
</div>

<?php
    }
    ?>
