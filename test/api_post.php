<?php

$curl = curl_init();
$data = ["name" => "bep ga",
        "category" => "đồ dùng nhà bếp",
        "price" => 10000,
        "imgURL" => "http://",
        "brand" => "havana",
        "description" => "beautiful"];
$username = "karl";
$password = "1990";
$base = base64_encode("$username:$password");
$base = "83dac5c7725b9614503f97fe4ee5ae2c";

curl_setopt($curl, CURLOPT_URL, 'ecommerce.local/api/products');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer $base"));


$resp = curl_exec($curl);
print_r($resp);