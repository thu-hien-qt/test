<?php

$list = array("white", "green", "red", "blue", "black");
foreach($list as $val){
    echo "$val, ";
}

sort($list);
?>
<ul>
    <?php
    foreach($list as $val){
        echo "<li> $val </Li> ";
    }

    ?>
</ul>