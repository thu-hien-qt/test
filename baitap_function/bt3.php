<p>Tim giai thua cua cac so nguyen to</p>
<form method="POST">
    <p>
        <label for="guess">Input number</label>
        <input type="text" name="n" id="guess" />
    </p>
    <input type="submit" />
</form>
<?php


function tinhGiaThuaSoNguyenTo($x)
{
    require 'bt2.php';
    require 'bt1.php';
    for ($i = 1; $i <= $x; $i++) {
        if (kiemTraSoNguyenTo($i)) {
            echo "$i!= " . tinhGiaiThua($i) . "<br>";
        }
    }
}
if (isset($_POST["n"]) && $_POST['n'] >1) {
    echo "Giai thua cua cac so nguyen to nho hon " . $_POST['n'] . " la: <br>";
    tinhGiaThuaSoNguyenTo($_POST["n"]);
}else{
    echo "nhập n lên ô";
}





?>