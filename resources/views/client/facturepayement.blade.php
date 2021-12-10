<?php
    try {
        
        $status = $_POST['data']['status'];
        $amount = $_POST['data']['invoice']['total_amount'];
        $hash = $_POST['data']['hash'];
        //Prenez votre MasterKey, hashez la et comparez le résultat au hash reçu par IPN
        if($_POST['data']['hash'] === hash('sha512', "emDzaHBl-dcXF-SZc3-SRci-j3WLjKPGN6cT")) {
      
          if ($_POST['data']['status'] == "completed") {
            array (
                'data' => 
                    array (
                    'response_code' => '00',
                    'response_text' => 'Transaction Found',
                    'hash' => '8c6666a27fe5daeb76dae6abc7308a557dca5be1bda85dfe5d81fa330cdc0bc3c4b37765fe5d2cc36aa2ba0f9284226a80f5488d14740fa70769d6079a179406',
                    'invoice' => 
                        array (
                        'token' => 'test_jkEdPY8SuG',
                        'items' => 
                            array (
                            'item_0' => 
                                array (
                                'name' => 'Chaussures Croco',
                                'quantity' => '3',
                                'unit_price' => '10000',
                                'total_price' => '30000',
                                'description' => 'Chaussures faites en peau de crocrodile authentique qui chasse la pauvreté',
                            ),
                            'item_1' => 
                            array (
                                'name' => 'Chemise Glacée',
                                'quantity' => '1',
                                'unit_price' => '5000',
                                'total_price' => '5000',
                                'description' => '',
                            ),
                        ),
                        'taxes' => 
                            array (
                            'tax_0' => 
                                array (
                                'name' => 'TVA (18%)',
                                'amount' => $amount,
                            ),
                            'tax_1' => 
                                array (
                                'name' => 'Livraison',
                                'amount' => $amount',
                            ),
                    ),
                    'token'=>'test_Jh2T8skw1j',
                    'total_amount' => '42300',
                    'description' => 'Paiement de 42300 FCFA pour article(s) achetés sur Magasin le Choco',
                    ),
                    'custom_data' => 
                        array (
                        'categorie' => 'Jeu concours',
                        'periode' => 'Noël 2015',
                        'numero_gagnant' => '5',
                        'prix' => 'Bon de réduction de 50%',
                        ),
                    'actions' => 
                        array (
                        'cancel_url' => 'http://www.tranchpay.com/annulerpayement.aspx',          //A FAIRE URL APRES ANNULATION PAYMENT
                        'callback_url' => 'www.tranchpay.com/facturepayement.aspx',               //A FAIRE URL APRES PAYMENT
                        'return_url' => 'http://www.tranchpay.com/retourpayement.aspx',           //A FAIRE URL APRES VOULOIR RETOUR EN ARRIERE PAYMENT
                        ),
                    'mode' => 'test',
                    'status' => 'completed',
                    'customer' => 
                        array (
                        'name' => 'Alioune Faye',
                        'phone' => '774563209',
                        'email' => 'aliounefaye@gmail.com',
                        ),
                    'receipt_url' => 'https://paydunya.com/sandbox-checkout/receipt/pdf/test_jkEdPY8SuG.pdf',
                    ),
                )  ;
            
            
            
          }
      
          } else {
                die("Cette requête n'a pas été émise par PayDunya");
          }
        } catch(Exception $e) {
          die();
        }
      
?>