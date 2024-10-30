<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 0,
    CURLOPT_URL => 'knowledgecenter.kounselly.local/wp-json/api/v1/elearning-courses',
    CURLOPT_USERAGENT => 'Kounselly Test Api',
    CURLOPT_SSL_VERIFYPEER => false
));

$resp = curl_exec($curl);

//Dữ liệu ở dạng JSON
$data = json_decode($resp);
var_dump($data);

curl_close($curl);