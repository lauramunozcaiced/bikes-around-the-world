<?php

define("KEY","evertechtest");
define("COD","AES-128-ECB");

require 'db_connect.php';


function verCatalogo(){
    $mysqli = dbConnect();
    $sql = "SELECT * FROM products";
    $result = $mysqli -> query($sql);
    while($row = $result -> fetch_array(MYSQLI_ASSOC)){
        $lista[] = $row;
    }
    dbClose($mysqli);
    return $lista;  
} 
function verProducto($cod){
    $mysqli = dbConnect();
    $sql = "SELECT * FROM products where id = $cod";
    $result = $mysqli -> query($sql);
    $row = $result -> fetch_array(MYSQLI_ASSOC);
    dbClose($mysqli);
    return $row;  
} 

function saveOrder($email,$mobile,$ship,$name,$price,$codeorder){
    $mysqli = dbConnect();
    $query = "SELECT * FROM orders WHERE code_order = '$codeorder'";
    $result_search = $mysqli -> query($query);
    $row = $result_search -> fetch_array(MYSQLI_ASSOC);
    if(!$row){
        $sql = "INSERT INTO orders (customer_email,customer_mobile,status,
        created_at,update_at,ship,id,customer_name,price,email_paypal,data_paypal,code_order,currency,send) VALUES ('$email', 
         '$mobile', 'created', current_timestamp(), current_timestamp(), '$ship', NULL, 
         '$name', '$price','',NULL,'$codeorder','',0)";
         $result = $mysqli -> query($sql);
            return true;
    }else{
            return false;
    }
    
   
     dbClose($mysqli);

}

function updateOrder($status,$email,$data,$currency,$codeorder){
    $mysqli = dbConnect();
    $query = "SELECT * FROM orders WHERE code_order = '$codeorder'";
    $result_search = $mysqli -> query($query);
    $row = $result_search -> fetch_array(MYSQLI_ASSOC);
    if($row){
        $sql = "UPDATE orders SET status = '$status' , email_paypal = '$email',
         data_paypal = '$data', currency = '$currency' WHERE code_order = '$codeorder'";
         $result = $mysqli -> query($sql);
        return true;
            
    }else{
            return false;
    }
     dbClose($mysqli);
}

function getProducts($codeorder){
    $mysqli = dbConnect();
    $query = "SELECT * FROM orders WHERE code_order = '$codeorder'";
    $result = $mysqli -> query($query);
    while($row = $result -> fetch_array(MYSQLI_ASSOC)){
        $lista[] = $row;
    }
    dbClose($mysqli);
    return $lista;
}

function sendMailMessage($email,$text){

    $headers = "From: Bikes<shop@bikesaroundtheworld.com> \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message = '<html><body style="width: 350px;font-family: Arial, Helvetica, sans-serif; margin: 0 auto;">';
    $message .= '<h3 style="border-radius:20px;letter-spacing: 2px; background-color: #ed1f24; color: white; text-transform: uppercase; padding: 15px; text-align: center; ">You pay is approved</h3>';
    $message .= '<h4 style="text-align: center; padding: 5px 15px;">Your order:</h4>';
    $message .= '<p style="text-align: center; padding: 5px 15px;">'.$text.'</p>';
    $message .= '<p style="text-align: center; padding: 5px 15px;">It is being processed by the store and very soon you will receive confirmation that your order is on the way.</p>';
    $message .= ' <p style="text-align: center; padding: 5px 15px;">If you have any questions, you can contact us on our <b>WhatsApp +573204993260</b>. We will inform you everything about your order.</p>';    
    $message .= '<p style="text-align: center; padding: 15px; font-size: 13px; letter-spacing: 1px;">With love <br>by <a href="https://bikes-around-the-world.000webhostapp.com/" style="color: #ed1f24; text-decoration: none;">Bikes around the world</a></p>';
    $message .= '</body></html>';
 
    
    if(mail($email, 'Bikes around the world', $message , $headers)){
        return "Send";
    }else{
        return "Error";
    }
    
}

?>