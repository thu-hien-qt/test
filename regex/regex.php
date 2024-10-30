<?php

$str = "questions/227,39125/what-is<br> the. meaning\tof_w_regular-expression-in-php-";
echo "String: $str<br>";
echo "<br>---";

echo "<br>Kiểm tra xem một chuỗi có chứa chuỗi khác không <br>";
if (preg_match("/expression/", $str)) {
    echo "có ";
} else {
    echo "không";
}
echo "<br>---";

// nếu một từ thì không xoá
echo "<br>Xóa từ cuối cùng từ một chuỗi đã cho<br>";
echo preg_replace('/\W*\w+\W*$/', "",$str);
echo "<br>---";

// không xoá dấu tab và các dấu xuống hàng
echo "<br>Xóa các khoảng trống trong chuỗi<br>";
echo preg_replace('/\s+/', "",$str);
echo "<br>---";


echo "<br>Xóa tất cả các kí tự không phải là số, ngoại trừ dấu phảy và dấu chấm<br>";
echo preg_replace('/[^\d|,|.]/', "",$str);
echo "<br>---";

echo '<br>Xóa tất cả các kí tự ngoại trừ a-z A-Z 0-9 hoặc " "<br>';
echo preg_replace('/[^\w| ]|_/', "",$str);
echo "<br>---";