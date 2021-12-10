<?php

require('conf.php');

$direct_pay = new \Paydunya\DirectPay();

if ($direct_pay->creditAccount("776727563", 5000)) {
  echo $direct_pay->description."<br/>";
  echo $direct_pay->response_text."<br/>";
  echo $direct_pay->transaction_id."<br/>";
}else{
  echo $direct_pay->response_text."<br/>";
}