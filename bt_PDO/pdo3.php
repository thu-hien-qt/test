<form method="post">
<p>Please login</p>
<label for="email">Login:</label>
<input type="text" name="login" id="email"><br>
<label for="pass">Password: </label>
<input type="password" name="password" id="pass">
<input type="submit">
</form>
<?php
require_once "PDO.php";
if (isset($_POST['login']) && isset($_POST['password'])) {
    $e = $_POST['login'];
    $p = $_POST['password'];
    $sql = 'SELECT name FROM users
            WHERE login = ".$pdo->quote($e).";
            AND password = "$p"';
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
    if ($row) {
        echo "login thanh cong";

    } else {
        echo "login that bai";
    }
}
?>