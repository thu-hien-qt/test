<form method="post">
    <label for="year">year</label>
    <input type="year" name="year" id="year" value="<?php if (isset($_POST["year"])) {
                                                        echo $_POST["year"];
                                                    } else {
                                                        echo "";
                                                    } ?> ">
    <input type="submit">
</form>

<?php
if (isset($_POST["year"])) {
    $y = $_POST["year"];
    $y .= "-2-2";
    $date = new DateTime($y);
    if ($date->format("L")) {
        echo $_POST["year"] . " là năm nhuận";
    } else {
        echo $_POST["year"] . " không phải là năm nhuận";
    }
} else {
    echo "Nhập năm vào";
}
