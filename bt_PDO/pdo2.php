<?php

require_once "PDO.php";
if (
    isset($_POST['name']) && isset($_POST['login'])
    && isset($_POST['password'])
) {
    $sql = "INSERT INTO users (name, login, password)
VALUES (:name, :login, :password)";
    echo ("<pre>\n" . $sql . "\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':login' => $_POST['login'],
        ':password' => $_POST['password']
    ));
}
?>

<html>

<head></head>

<body>
    <p>Add A New User</p>
    <form method="post">
        <p>Name:<input type="text" name="name" size="40"></p>
        <p>Login:<input type="text" name="login"></p>
        <p>Password:<input type="password" name="password"></p>
        <p><input type="submit" value="Add New" /></p>
    </form>
</body>