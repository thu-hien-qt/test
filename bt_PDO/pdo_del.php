<?php
require_once "pdo.php";
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
if (isset($_POST['delete']) && isset($_POST['ID'])) {
    $sql = "DELETE FROM users WHERE ID = :zip";
    echo "<pre>\n$sql\n</pre>\n";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['ID']));
}
?>
<html>

<head></head>

<body>
    <table border="1">
        <?php
        $stmt = $pdo->query("SELECT name, login, password, ID FROM users");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>";
            echo ($row['name']);
            echo ("</td><td>");
            echo ($row['login']);
            echo ("</td><td>");
            echo ($row['password']);
            echo ("</td><td>");
            echo ('<form method="post"><input type="hidden" ');
            echo ('name="ID" value="' . $row['ID'] . '">' . "\n");
            echo ('<input type="submit" value="Del" name="delete">');
            echo ("\n</form>\n");
            echo ("</td></tr>\n");
        }
        ?>
    </table>
    <p>Add A New User</p>
    <form method="post">
        <p>Name:<input type="text" name="name" size="40"></p>
        <p>Email:<input type="text" name="login"></p>
        <p>Password:<input type="password" name="password"></p>
        <p><input type="submit" value="Add New" /></p>
    </form>
</body>