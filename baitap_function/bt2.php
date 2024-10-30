<?php

function kiemTraSoNguyento($a){
    if ($a <= 1){
        return false;
    } 
    if ($a == 2) {
        return true;
    }
    for ($i = 2; $i < $a; $i++) {
        if ($a % $i ==0) {
            return false;
        }
    }
    return true;
}



?>