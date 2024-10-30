<?php

require_once "movie_pdo.php";
session_start();

if (isset($_POST["no"])) {
    unset($_SESSION['delete']);
    header("location: movie_webAd.php");
}

if (isset($_POST["yes"])) {
    $sql1 = "DELETE FROM film_actor WHERE filmID = :f";
    $stmt1 = $pdo->prepare($sql1);
    $stmt1->execute(array(':f' => $_SESSION['filmID']));

    $sql2 = "DELETE FROM film_genre WHERE filmID = :g";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute(array(':g' => $_SESSION['filmID']));

    $sql = "DELETE FROM film WHERE filmID = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_SESSION['filmID']));
    unset($_SESSION["filmID"]);
    $_SESSION['del'] = $_SESSION ['title'] . " deleted";
    unset($_SESSION['title']);
    header("location: movie_webAd.php");
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="movie_web.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<style>
    .form {
        width: 17em;
        height: 3em;
        border: 1px solid black;
        border-radius: 20px;
        margin: 3em auto;
        padding: 0.5em;
        font-size: 20px;
        
    }

    .select {
        padding:0 3em;
    }

    .button {
        padding: 0.5 1em;
        text-align: center;
        float: left;
        margin: 0 2em;
        margin-top: 1em;
    }

    .button:hover {
        background-color: blue;
    }

    .clear {
        clear: both;
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
</body>

</html>
<div class="form">
<form method="post">
    <div>If you want to delete <?php if (isset($_SESSION["delete"])) { echo $_SESSION["delete"];
                                 }?> :</div>
    <div class="select">
        <div><button class="button" type="submit" name="no">No</button></div>
        <div><button class="button" type="submit" name="yes">Yes</button></div>
        <div class="clear"></div>
    </div>
</form>
<div class="clear"></div>
</div>
