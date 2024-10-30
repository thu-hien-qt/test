<?php

$lop1 = array("ha", "phuong", "nhi");
$lop2 = array("dat", "nga");

//gop 2 mang
$ten = array_merge($lop1,$lop2);
foreach ($ten as $val) {
    echo $val . "<br>";
}


?>