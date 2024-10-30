<form method="post">
    <label for="date">Date</label>
    <input type="date" name="date" id="date" value ="<?php if(isset($_POST["date"])) {
        echo $_POST["date"];
        } ?>">
    <input type="submit">
</form>
<?php

if(isset($_POST["date"])) {
    $date = new datetime($_POST["date"]);
    echo $date->format("l") ;
} else {
    echo "nhập ngày vào";
}

;


