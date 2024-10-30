<?php
require_once "movie_pdo.php";
$statement1 = $pdo->query('SELECT name FROM genres');
session_start();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="movie_web.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <div class="hd">
        <div class="icon">
            <a href="movie_web.php"><img class="icon" src="https://img.lovepik.com/png/20231022/Blue-movie-film-cartoon-pop-movie-sticker-movie-logo-pop_307479_wh860.png" alt=""></a>
        </div>

        <?php
        while ($row = $statement1->fetch(PDO::FETCH_ASSOC)) {
            echo ' <div class="genre">
            <a href="http:#//"><span>' . $row["name"] . '</span></a>
        </div>';
        }

        ?>
        <div>
            <div class="user">
                <a href="movie_login.php"><i class="fa-solid fa-user">
                </i></a>
                
                <?php 
                if (isset($_SESSION["name"])) {
                    echo '<span class= "name">' . $_SESSION["name"] . '</span>';
                    unset($_SESSION["name"]);
                    echo '<a href="movie_web.php"><span class ="log">Log out</span></a>'; 
                } else {
                    echo '<a href="movie_login.php"><span class = "log">Log in</span></a>';
                } ?>
            </div>
        </div>

        <div class="clear"></div>
    </div>
</body>

</html>

<?php
$statement = $pdo->query("SELECT 
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
GROUP BY 
    film.title, 
    film.manufacture, 
    film.link, 
    film.description;
");

echo "<table class='table'>";
echo '<tr><th>Title</th><th>Genres</th><th>Manufacture</th><th>Director</th><th>Actors</th><th>Link</th><th>Description</th></tr>';
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr><td>';
    echo $row["title"];
    echo '</td><td>';
    echo $row["genres"];
    echo '</td><td>';
    echo $row["manufacture"];
    echo '</td><td>';
    echo $row["director"];
    echo '</td><td>';
    echo $row["actors"];
    echo '</td><td>';
    echo '<a href="' . $row["link"] . '">' . $row["link"] . '</a>';
    echo '</td><td>';
    echo $row["description"];
    echo '</td></tr>';
};
echo "</table>";


?>