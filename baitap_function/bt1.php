<?php

function tinhGiaiThua($x){
    $giaiThua = 1;
    for($i = 1; $i <= $x; $i++){
    $giaiThua *= $i;
    }
    return $giaiThua;
}
/*
if(isset($_GET["x"])){
    $a = $_GET["x"];
    echo "$a! = " . tinhGiaiThua($a);
}else {
    echo "nhap x = ";
}
*/


?>