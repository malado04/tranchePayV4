<?php
session_start();

if (isset($_GET['reset'])) {
  $_SESSION["cart"] = array();
}

if (!isset($_SESSION["cart"])) {
  $_SESSION["cart"] = array();
}

// Nous ajoutons simplement un tableau contenant les informations sur le produit au niveau du panier
function addProducts($name,$quantity,$unit_price) {
  $_SESSION["cart"][] = array(
    'name' => $name,
    'quantity' => $quantity,
    'unit_price' => $unit_price,
    'total_price' => $quantity*$unit_price
  );
}

if (isset($_POST['cartpush'])) {
  addProducts($_POST['name'],$_POST['quantity'],$_POST['price']);
}

?>
<html>
<head>
  <title>La boutique de Sandra</title>
  <style type="text/css">
    body{
      background-color: #272727;
      font-family: Arial;
      font-size: 14px;
    }
    h1{
      font-weight: 500;
    }
    .container{
      margin:60px auto 0 auto;
      width:600px;
      min-height: 400px;
      background-color: #fafafa;
      border: 1px solid #e4e4e4;
      padding: 15px 30px;
    }
    input[type="text"]{
      padding:4px;
      display: block;
      width:300px;
      margin-bottom: 8px;
    }
    table{
      width:100%;
      margin-bottom: 50px;
    }
    th{
      background: #982b3c;
      color:#fff;
      text-align: left;
      padding:8px;
      font-weight: 300;
      font-size: 13px;
    }
    td{
      padding:8px;
      font-size: 13px;
      border-bottom: 1px solid #e4e4e4;
    }
    .checkout{
      background: #2c8211;
      padding:10px;
      font-size: 16px;
      font-weight: bold;
      color:#fff;
    }
  </style>
</head>
<body>
<div class="container"><h1>La boutique de {{ Auth::user()->prenom }}</h1>
<table cellspacing="0" cellpadding="0">
<tr>
<th>Nom du Produit</th>
<th>Quantité</th>
<th>Prix Unitaire</th>
<th>Prix Total</th>
</tr>
<?php
foreach ($_SESSION["cart"] as $product) {
  echo "<tr><td>".$product["name"]."</td><td>".$product["quantity"]."</td><td>".$product["unit_price"]."</td><td>".$product["total_price"]."</td></tr>";
}
?>
</table>
<form method="post" action="{{route('ajoutproduit')}}">
@csrf
<fieldset>
  <legend>Information du produit</legend>
  <input type="text" name="name" placeholder="Nom du produit"required=""><br>
  <input type="number" name="quantity" placeholder="Quantité produit"  required=""><br>
  <input type="number" name="price" placeholder="Prix du produit" min="500" required=""> <br>                               
  <textarea name="desc" placeholder="Desciption du produit"></textarea> <br>                           
  <input type="hidden" value="ok" name="cartpush">
  <input type="submit" value="Ajouter le produit"> <a href="?reset=ok"> Réinitialiser la table </a>
</fieldset>
</form>
<?php if (count($_SESSION["cart"]) > 0) { ?>
<br>
<hr/>
<br>
<form method="post" action="redirect_checkout.php">
<input type="hidden" value="ok" name="checkout">
<fieldset>
  <legend>Information du client</legend>
    <input type="tel" name="cniclient" class="form-control input" placeholder="CNI du client" required="required"><br>
    <input type="text" name="nomc" class="form-control input" placeholder="Nom Complet"><br>
    <input type="text" name="adresse" class="form-control input" placeholder="Adresse">
</fieldset><br>

<input type="submit" value="Payer avec PAYDUNYA" class="checkout"> <!-- or <a href="index2.php" title="Paiement PSR">Paiement PSR avec PAYDUNYA</a> -->
</form>
<?php } ?>
</div>
</body>
</html>