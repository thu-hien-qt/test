<?php
require_once "movie_pdo.php";
session_start();



if (isset($_POST["username"]) && isset($_POST["password"])) {
    $u = $_POST["username"];
    $p = $_POST["password"];
    $query = "SELECT name, username, password FROM users WHERE username = '$u' AND password = '$p'";
    $statement = $pdo->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if (empty($row)) {

    } else {
    $_SESSION["name"] = $row["name"];
    header("location: movie_webAd.php");
    }
} else {
    $_SESSION["error"] = "Incorrect username";
};



?>
<html>
<style>
    html {
        background-color: rgb(195, 195, 195);
    }

    .distan {
        width: 20em;
        padding: 0.7em 0.8em;
        border-radius: 10px;
        border: 1px solid gray;
        font-size: 17px;
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

    .clear {
        clear: both;
    }

    .hd {
        background-color: rgb(30, 30, 30);
    }

    .icon {
        width: 2.5em;
        height: 2.5em;
        float: left;
    }

    .genre {
        float: left;
        font-size: 1.5em;
        font-weight: 700;
        padding: 0 1em;
        margin-top: 0.5em;
    }

    .user {
        float: right;
        width: 2em;
        padding: 0.7em;
    }

    div a:hover {
        text-decoration: none;
        color: rgb(39, 166, 73) !important;
    }

    div a:link {
        color: white;
        text-decoration: none;
    }

    div a:visited {
        color: white;
    }
</style>

<body>

    <div class="hd">
        <div class="icon">
            <a href="movie_web.php"><img class="icon" src="https://img.lovepik.com/png/20231022/Blue-movie-film-cartoon-pop-movie-sticker-movie-logo-pop_307479_wh860.png" alt=""></a>
        </div>
        <div class="genre">
            <a href="http:#//"><span>Cartoon</span></a>
        </div>
        <div class="genre">
            <a href="http:#//"><span>Horror</span></a>
        </div>
        <div class="genre">
            <a href="http:#//">Comedy</a>
        </div>
        <div class="genre">
            <a href="http:#//">Romance</a>
        </div>
        <div class="user">
            <a href="movie_signup"><i class="fa-solid fa-user"></i></a>
        </div>
        <div class="clear"></div>
    </div>




    <div id="body">
        <div class="formm">
            <form method="post">
                <div>
                    <div class="form">
                        <input class="distan" type="text" name="username" placeholder="Username" aria-label="Username">
                    </div>
                    <div class="form">
                        <input class="distan" type="password" name="password" placeholder="Password" aria-label="password">
                    </div>
                </div>
                <div class="form">
                    <button class="distan submit" type="submit" name="submit"> <b>LOG IN</b></button>
                </div>
                <div>
                    <?php
                    if (isset($_SESSION["error"])) {
                        echo ('<p style="color:red">' . $_SESSION["error"] . "</p>\n");
                        unset($_SESSION["error"]);
                    }

                    if (isset($_SESSION["success"])) {
                        echo ('<p style="color:green">' . $_SESSION["success"] . "</p>\n");
                        unset($_SESSION["success"]);
                    }
                    ?>
                </div>
                <div class="clear"></div>
            </form>
        </div>

    </div>
</body>

</html>