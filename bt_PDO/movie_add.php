<?php

require_once "movie_pdo.php";
session_start();

$statement1 = $pdo->query('SELECT filmID, title  FROM film');
$statement2 = $pdo->query('SELECT personID, name FROM person WHERE `role` lIKE "actor"');
$statement3 = $pdo->query('SELECT personID, name FROM person WHERE `role` lIKE "director"');
$statement4 = $pdo->query('SELECT genreID, name  FROM genres');

if (
    isset($_POST['title'])
    && isset($_POST['manufacture']) && isset($_POST['director']) 
    && isset($_POST['link']) && isset($_POST['img']) && isset($_POST['description'])
) {
    $sql = "INSERT INTO film (title, manufacture, directorID, link, description, img)
        VALUES (:title, :manufacture, :directorID, :link, :description,:img)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':title' => $_POST['title'],
        ':manufacture' => $_POST['manufacture'],
        ':directorID' => $_POST['director'],
        ':link' => $_POST['link'],
        ':description' => $_POST['description'],
        ':img' => $_POST['img'],
    ));
    $_SESSION["success"] = 'Film '. $_POST["title"] . ' added';
}

if (isset($_POST["title"])) {
    $statement = $pdo->query('SELECT filmID, title  FROM film');
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        if ($row["title"] == $_POST["title"]) {
            $filmID = $row["filmID"];
        }
    };
}

if (isset($_POST["genres"])) {

    foreach ($_POST["genres"] as $genreID) {
        $sql2 = "INSERT INTO film_genre (filmID, genreID)
    VALUES (:filmID, :genreID)";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute(array(
            ':filmID' => $filmID,
            ':genreID' => $genreID
        ));
    }
}

if (isset($_POST["actors"])) {

    foreach ($_POST["actors"] as $actorID) {
        $sql1 = "INSERT INTO film_actor (filmID, actorID)
        VALUES (:filmID, :actorID)";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute(array(
            ':filmID' => $filmID,
            ':actorID' => $actorID
        ));
    }
}
 
if (isset($_POST["addNew"])) {
    header('location: movie_webAd.php');
}


?>

<html>

<head></head>

<body>
    <h1>Add A New Film</h1>
    <form method="post">
        <p>Title:<input type="text" name="title" size="40"></p>
        <p>Genre:
            <?php
            while ($row4 = $statement4->fetch(PDO::FETCH_ASSOC)) {
                echo '<label for="' . $row4["name"] . '">' . $row4["name"] . '</label>';
                echo '<input type="checkbox" name="genres[]" id="' . $row4["name"] . '" value="' . $row4["genreID"] . '">';
            }
            ?>

        </p>
        <p>Manufacture of year:<input type="year" name="manufacture"></p>
        <p>Director:
            <label for="director"></label>
            <select name="director" id="director">
                <?php
                while ($row3 = $statement3->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value ="' . $row3["personID"] . '">' . $row3["name"] . '</option>';
                }
                ?>
            </select>
        </p>
        <p>Actors:
            <?php
            while ($row2 = $statement2->fetch(PDO::FETCH_ASSOC)) {
                echo '<label for="' . $row2["name"] . '">' . $row2["name"] . '</label>';
                echo '<input type="checkbox" name="actors[]" id="' . $row2["name"] . '" value="' . $row2["personID"] . '">';
            }
            ?>

        </p>
        <p>Img link: <input type="url" name="img"></p>
        <p>Link: <input type="url" name="link"></p>
        <p>Description: <input type="text" name="description"></p>
        <p><input type="submit" name="addNew" value="Add New" /></p>
    </form>
</body>