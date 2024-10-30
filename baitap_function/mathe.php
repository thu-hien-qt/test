<?php
if (isset($_POST["firstNumber"]) && isset($_POST["secondNumber"])) {
    $result = 0;  
    $a = $_POST["firstNumber"];
    $b= $_POST["secondNumber"];
    if ($_POST["method"] == "+") {
        $result = $_POST["firstNumber"] + $_POST["secondNumber"];
    } elseif ($_POST["method"] == "-") {
        $result = $_POST["firstNumber"] - $_POST["secondNumber"];
    } elseif ($_POST["method"] == "*") {
        $result = $_POST["firstNumber"] * $_POST["secondNumber"];
    } elseif ($_POST["method"] == "/") {
        $result = $_POST["firstNumber"] / $_POST["secondNumber"];
    };
} else {
    echo "Nhap vao hai so de thuc hien phep tinh";
}


require 'math.php';
