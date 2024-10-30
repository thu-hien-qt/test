<?php

$giatri = array(0, 6, 3);

$tong = 0;
for($i = 0 ; $i < count($giatri) ; $val++){
    $tong = $giatri[$i] + $tong;
   
}
$trungbinh = $tong / count($giatri);
echo "trung binh cua cac phan tu trong mang la: $trungbinh";


?>