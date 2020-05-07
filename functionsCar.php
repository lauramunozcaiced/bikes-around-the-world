<?php
$messageCar = "";

if(isset($_POST['toAction'])){
    switch($_POST['toAction']){
        case 'Add':
            $ID= openssl_decrypt($_POST['id'],COD,KEY);
            $name= openssl_decrypt($_POST['title'],COD,KEY);
            $price= openssl_decrypt($_POST['price'],COD,KEY);

            if(!isset($_SESSION['car'])){
                addProductToCar(0,$ID,$name,$price);
                $messageCar = 'The product was added.';
            }
            else{
                if(count($_SESSION['car'])!= 0){
                    $idProducts = array_column($_SESSION['car'],'id');
                    if(in_array($ID,$idProducts)){
                        $messageCar = "That product is in the car yet.";
                        
                    }else{
                       $numProducts = count($_SESSION['car']);
                       addProductToCar($numProducts,$ID,$name,$price);
                    }
                }else{
                    addProductToCar(0,$ID,$name,$price);
                    $messageCar = 'The product was added.';
                }  
            }

        break;
        case 'Delete':
            $ID= openssl_decrypt($_POST['id'],COD,KEY);
            if(is_numeric($ID)){
                foreach($_SESSION['car'] as $indice=>$product){
                    if($product['id'] == $ID){
                        unset($_SESSION['car'][$indice]);
                    }
                }
            }else{
                $messageCar= "The product doesn't exist.";
            }
        break;
    }
}

function addProductToCar($place,$ID,$name,$price){
    $bike = array(
        'id'=>$ID,
        'name'=>$name,
        'price'=>$price,
        'cantidad'=>$_POST['cant'],
        
    );
    $_SESSION['car'][$place] = $bike; 

}

?>