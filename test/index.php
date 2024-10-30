
<?php
$x = 1;
do {
    if ($x == 1) {
        echo $x++;
    } else {
        echo '-' . $x++;
    }
} while ($x <= 10);
echo "<br>";

$z = 1;
$y = 0;
while ($z <= 20) {
    $y = $y + $z++;
};
echo "Tong tu 1 den 20 la: " . $y;
echo "<br>";

$x = 1;
$y = "";
while ($x++ <= 6) {
    echo $y .= "*";
    echo "<br>";
}

for ($x = 1; $x <= 5; $x++) {
    if ($x < 5) {

        for ($y = 1; $y <= $x; $y++) {
            echo "*";
            echo " ";
        };
        echo "<br>";
    } elseif ($x = 5) {

        for ($x = 1; $x <= 5; $x++) {
            for ($y = 1; $y <= (6 - $x); $y++) {
                echo "*";
                echo " ";
            };
            echo "<br>";
        }
    }
}

for ($x = 2; $x <= 9; $x++) {
    echo "<p> Nhan he so $x la: <br> </p>";
    for ($y = 1; $y <= 10; $y++) {
        echo "$x * $y = " . $x * $y;
        echo "<br>";
    }
    echo "----- <br>";
}

?>

<table border=1 width=800px
height=800px style="border-collapse:collapse"> 
<?php
for($x=1; $x<=8; $x++){
    echo "<Tr>";
    for($y=1; $y<=8 ; $y++){
        if(($x + $y )% 2){
            echo "<td style='background-color:gray'
            ></td>";
        }else{
            echo "<td></td>";
        }
        
    }
    echo "</tr>";
}
?>
</table>
