<?php


function hangChuc($x)
{
    $cachDoc2 = array(
        0 => 'không ',
        1 => 'một ',
        2 => 'hai ',
        3 => 'ba ',
        4 => 'bốn ',
        5 => 'năm ',
        6 => 'sáu ',
        7 => 'bảy ',
        8 => 'tám ',
        9 => 'chín ',
        10 => 'mười ',
        11 => 'mười một ',
        12 => 'mười hai ',
        13 => 'mười ba ',
        14 => 'mười bốn ',
        15 => 'mười năm ',
        16 => 'mười sáu ',
        17 => 'mười bảy ',
        18 => 'mười tám ',
        19 => 'mười chín ',
        20 => 'hai mươi ',
        30 => 'ba mươi ',
        40 => 'bốn mươi ',
        50 => 'năm mươi ',
        60 => 'sáu mươi ',
        70 => 'bảy mươi ',
        80 => 'tám mươi ',
        90 => 'chín mươi ',
    );
    $cachDoc = array(
        1 => "mốt ",
        2 => 'hai ',
        3 => 'ba ',
        4 => "tư ",
        5 => "lăm ",
        6 => 'sáu ',
        7 => 'bảy ',
        8 => 'tám ',
        9 => 'chín ',
    );
    if ($x % 10 == 0) {
        return $cachDoc2[$x];
    }
    if ($x < 21) {
        return $cachDoc2[$x];
    } else {
        $chuc = floor($x / 10);
        $donVi = $x -  $chuc * 10;
        return $cachDoc2[($chuc * 10)]  . $cachDoc[$donVi];
    }
}
function hangTram($x)
{
    $cachDoc = array(
        0 => 'không ',
        1 => 'một ',
        2 => 'hai ',
        3 => 'ba ',
        4 => 'bốn ',
        5 => 'năm ',
        6 => 'sáu ',
        7 => 'bảy ',
        8 => 'tám ',
        9 => 'chín ',
    );
    if ($x < 100) {
        return hangChuc($x);
    }
    $tram = floor($x / 100);
    $chuc = $x - $tram * 100;
    if ($x % 100 == 0) {
        return $cachDoc[$tram] . "trăm ";
    }
    if ($chuc < 10) {
        return $cachDoc[$tram] . " trăm lẻ " . $cachDoc[$chuc];
    }
    return $cachDoc[$tram] . "trăm " . hangChuc($chuc);
}

function numberToLettes($x)
{
    $a = strlen($x) % 3;
    if ($a == 1) {
        $x = "00" . strval($x);
    } elseif ($a == 2) {
        $x = "0" . strval($x);
    }

    $x = str_split($x, 3);
    $x = array_reverse($x);

    $reading = "";
    for ($i = 0; $i < count($x); $i++) {
        if ($i == 0) {
            $reading = hangTram((float)$x[$i]);
        }
        if ($i % 3 == 1) {
            if ($x[0] < 10) {
                $reading = hangTram((float)$x[$i]) . "nghìn lẻ " . $reading;
            } else {
                $reading = hangTram((float)$x[$i]) . "nghìn " . $reading;
            }
        }
        if ($i % 3 == 2) {
            $reading = hangTram((float)$x[$i]) . "triệu " . $reading;
        }
        if ($i % 3 == 0 && $i > 1) {
            $reading = hangTram((float)$x[$i]) . "tỷ " . $reading;
        }
    }
    return $reading;
}
$x = "";
if (isset($_POST["number"])) {
    $x = (float)$_POST["number"];
} else {
    echo "Nhập vào một số nguyên";
}
?>
<form method="POST">
    <label for="change">Chuyển số thành chữ </label>
    <input type="number" name="number" id="change" value="<?php echo $x ?>">
    <input type="submit" name="submit">
    <p><?php
        if ($x > 0) {
            echo "Kết quả là: <br>";
        }
        echo numberToLettes($x) ?></p>

</form>