<?php

require_once "movie_pdo.php";
session_start();

$statement1 = $pdo->query('SELECT filmID, title  FROM film');
$statement2 = $pdo->query('SELECT personID, name FROM person WHERE `role` lIKE "actor"');
$statement3 = $pdo->query('SELECT personID, name FROM person WHERE `role` lIKE "director"');
$statement4 = $pdo->query('SELECT genreID, name  FROM genres');

if (isset($_SESSION['filmID'])) {
    $filmID = $_SESSION['filmID'];
}

if (isset($_SESSION['title'])) {
    $title = $_SESSION['title'];
    
}

$statement5 = $pdo->query("SELECT 
    film.filmID,
    film.title,
    GROUP_CONCAT(DISTINCT genres.name SEPARATOR ', ') AS genres, 
    film.manufacture, 
    D.name AS director, 
    GROUP_CONCAT(DISTINCT A.name SEPARATOR ', ') AS actors, 
    film.link, 
    film.description 
FROM 
    film
JOIN 
    film_genre ON film.filmID = film_genre.filmID
JOIN 
    genres ON film_genre.genreID = genres.genreID
JOIN 
    person D ON film.directorID = D.personID
JOIN 
    film_actor ON film.filmID = film_actor.filmID
JOIN 
    person A ON film_actor.actorID = A.personID
WHERE film.filmID = $filmID
GROUP BY 
    film.title, 
    film.manufacture, 
    film.link, 
    film.description;
");
$row5 = $statement5->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['manufacture']) && isset($_POST['director']) && isset($_POST['link']) && isset($_POST['description'])) {
    $sqlf = "UPDATE film
        SET manufacture = :manufacture, 
            directorID = :directorID,
            link = :link,
            description = :description
        WHERE filmID = :filmID";
    $stmtf = $pdo->prepare($sqlf);
    $stmtf->execute(array(
        ':manufacture' => $_POST['manufacture'],
        ':directorID' => $_POST['director'],
        ':link' => $_POST['link'],
        ':description' => $_POST['description'],
        ':filmID' => $filmID
    ));
} else {
    echo "không được";
}

if (isset($_POST["actors"])) {

    $sqla = "DELETE FROM film_actor WHERE filmID = :f";
    $stmta = $pdo->prepare($sqla);
    $stmta->execute(array(':f' => $filmID));

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

if (isset($_POST["genres"])) {

    $sqlg = "DELETE FROM film_genre WHERE filmID = :f";

    $stmtg = $pdo->prepare($sqlg);
    $stmtg->execute(array(':f' => $filmID));

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


if (isset($_POST['update'])) {
    $_SESSION['update'] = $_SESSION['title']. " updated";
    unset($_SESSION["title"]);
    header("location: movie_webAd.php");
}


?>

<html>

<head></head>

<body>
    <h1>Update Film</h1>
    <form method="post">
        <h2>Title: <?php echo $title ?></h2>

        <p>Genre:
            <?php
            while ($row4 = $statement4->fetch(PDO::FETCH_ASSOC)) {
                $checked = strpos($row5["genres"], $row4["name"]) !== false ? 'checked' : '';
                echo '<label for="' . $row4["name"] . '">' . $row4["name"] . '</label>';
                echo '<input type="checkbox" name="genres[]" id="' . $row4["name"] . '" value="' . $row4["genreID"] . '" ' . $checked . '>';
            }
            ?>
        </p>

        <p>Manufacture of year:<input type="year" name="manufacture" value="<?php echo $row5['manufacture'] ?>"></p>
        <p>Director:
            <label for="director"></label>
            <select name="director" id="director" value=" <?php echo $row5['director'] ?>">
                <?php
                while ($row3 = $statement3->fetch(PDO::FETCH_ASSOC)) {
                    if ($row3["name"] == $row5["director"]) {
                        $val = '" selected >';
                    } else {
                        $val = '">';
                    }
                    echo '<option value ="' . $row3["personID"] . $val . $row3["name"] . '</option>';
                }
                unset($val);
                ?>
            </select>
        </p>

        <p>Actors:
        <?php
            while ($row2 = $statement2->fetch(PDO::FETCH_ASSOC)) {
                $checked = strpos($row5["actors"], $row2["name"]) !== false ? 'checked' : '';
                echo '<label for="' . $row2["name"] . '">' . $row2["name"] . '</label>';
                echo '<input type="checkbox" name="actors[]" id="' . $row2["name"] . '" value="' . $row2["personID"] . '" ' . $checked . '>';
            }
            ?>

        </p>
        <p>Link: <input type="url" name="link" value="<?php echo $row5['link'] ?>"></p>
        <p><label for="des">Description:</label></p>
        <textarea name="description" id="des" > <?php echo $row5['description'] ?></textarea>
        <p><input type="submit" name="update" value="Update" /></p>
    </form>
</body>