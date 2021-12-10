<?php
session_start();
require('conf.php');

$co = new \Paydunya\Checkout\CheckoutInvoice();
$total_amount = 0;
foreach ($_SESSION["cart"] as $product) {
  	$co->addItem($product['name'],$product['quantity'],$product['unit_price'],$product['total_price']);
	$total_amount += $product['total_price'];
    $userData = array( 
     'name'=> $product["name"],
     'quantity'=> $product["quantity"],
     'unit_price'=> $product["unit_price"],
     'client_cni'=> $_POST["cniclient"],
     'nomc'=> $_POST["nomc"],
     'adresse'=> $_POST["adresse"],
     'total_price'=> $product["total_price"]
     );
   require_once 'DB.php'; 
   $db = new DB();
   $tblName = 'paydounya';
$insert = $db->insert($tblName,$userData); 
}
 

$co->setTotalAmount($total_amount);

if($co->create()) {
  header("Location: ".$co->getInvoiceUrl());
}else{
  echo $co->response_text;
}

