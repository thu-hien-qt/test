<?php
$pdo = new PDO('mysql:host=localhost;dbname=app', 'root', '');
session_start();

if (isset($_SESSION["error"])) {
    echo ('<p style="color:red">' . $_SESSION["error"] . "</p>\n");
    unset($_SESSION["error"]);
}

if (isset($_SESSION["success"])) {
    echo ('<p style="color:green">' . $_SESSION["success"] . "</p>\n");
    unset($_SESSION["success"]);
}

$statement = $pdo->query('SELECT ID, Name, Login, Password FROM users');

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    if ($_POST["Login"] == $row["Login"]) {
        if ($_POST["Password"] == $row["Password"]) {
            $_SESSION["Login"] = $_POST["Login"];
            $_SESSION["success"] = "Loged in";
            header("location: welcome.php");
        } else {
            $_SESSION["error"] = "Incorrect password";
        }
    } else {
        $_SESSION["error"] = "Incorrect Login";
    }
}


if (isset($_POST["submit"])) {
    if ($_POST["username"] == "Hien" && $_POST["password"] == "12345") {
        header("location: welcome.php");
    } else {
        echo "Try againt";
    }
}


?>
<html>
<style>
    #body {
        background-color: rgb(195, 195, 195);
    }

    .distan {
        width: 20em;
        padding: 0.7em 0.8em;
        border-radius: 10px;
        border: 1px solid gray;
        font-size: 17px;
    }

    .clear {
        clear: both
    }

    .form {
        padding: 0.4em 0;
    }

    .submit {
        background-color: blue;
        color: white;
    }

    .formm {
        width: 24em;
        margin-top: 3em;
        padding-top: 1em;
        border: 1px solid white;
        border-radius: 10px;
        background-color: white;
        text-align: center;
        margin-left: auto;
        margin-right: auto;

    }
</style>

<body id="body">
    <div class="formm">
        <form method="post">
            <div>
                <div class="form">
                    <input class="distan" type="text" name="Login" placeholder="Username" aria-label="Username">
                </div>
                <div class="form">
                    <input class="distan" type="password" name="Password" placeholder="Password" aria-label="password">
                </div>
            </div>
            <div class="form">
                <button class="distan submit" type="submit" name="submit"> <b>LOG IN</b></button>
            </div>
            <div class="clear"></div>
        </form>
    </div>

</body>

</html>