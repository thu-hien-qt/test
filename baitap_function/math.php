<html>
<form method="post">
    <p>Nhap so thu nhat:</p>
    <input type="number" name="firstNumber" value="<?php echo $a ?>">
    <p>Nhap so thu hai</p>
    <input type="number" name="secondNumber" value= "<?php echo $b ?>">

    <button type="submit" name="method" value="+">+</button>
    <button type="submit" name="method" value="-">-</button>
    <button type="submit" name="method" value="*">*</button>
    <button type="submit" name="method" value="/">/</button>

</form>
<?php
echo $_POST["firstNumber"] . $_POST["method"] . $_POST["secondNumber"] . "=" . $result;
?>

</html>
