<?php

$giatri = array(-23, -17,-83, -52, -4);
$begin = $giatri[0];
for($i =0 ; $i < count($giatri) ; $i++){
    if($begin < $giatri[$i]){
        $begin = $giatri[$i];
    }
}
echo "so lon nhat la: $begin";


?>