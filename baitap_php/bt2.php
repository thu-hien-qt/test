<form method="post">
    <p>
        <label for="date1">date1</label>
        <input type="date" name="date1" id="date1" value="<?php
                                                            if (isset($_POST["date1"])) {
                                                                echo $_POST["date1"];
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>"> </br>
    </p>
    <p>
        <label for="date2">date2</label>
        <input type="date" name="date2" id="date2" value="<?php if (isset($_POST["date2"])) {
                                                                echo $_POST["date2"];
                                                            } else {
                                                                echo "";
                                                            } ?>"> </br>
    </p>

    <input type="submit">
</form>

<?php
if (isset($_POST["date1"]) && isset($_POST["date2"])) {
    $d1 = $_POST["date1"];
    $d2 = $_POST["date2"];
    $date1 = new DateTimeImmutable($d1);
    $date2 = new DateTimeImmutable($d2);
    $day = $date1->diff($date2);
    echo "Khoảng cách là: " . $day->format("%a") . " ngày";
} else {
    $d1 = "";
    $d2 = "";
    echo "nhập ngày vào";
};

?>