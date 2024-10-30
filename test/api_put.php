<?php
$curl = curl_init();
$data = ["name" => "nồi cơm điện",
        "category" => "đồ dùng nhà bếp",
        "price" => 10000,
        "imgURL" => "http://",
        "description" => "beautiful"];
curl_setopt($curl, CURLOPT_URL, 'ecommerce.local/api/products/5');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

$resp = curl_exec($curl);
var_dump($resp);