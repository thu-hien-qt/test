<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'ecommerce.local/api/products/5');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');

$resp = curl_exec($curl);
var_dump($resp);