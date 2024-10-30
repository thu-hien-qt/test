<?php
require_once "movie_pdo.php";
$statement = $pdo->query('SELECT name, type_of, manufacture, director, GROUP_CONCAT( actor) as actor, link, depict 
FROM film 
JOIN genre ON film.genreID = genre.genreID
JOIN filmactor ON filmactor.filmID = film.filmID
JOIN actors ON filmactor.actorID = actors.actorID
WHERE name LIKE "The boys"
GROUP BY name');
while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
};



// echo "<table border= '1'>";
// while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
//     echo '<tr><td>';
//     echo $row["name"];
//     echo '</td><td>';
//     echo $row["type_of"];
//     echo '</td><td>';
//     echo $row["manufacture"];
//     echo '</td><td>';
//     echo $row["director"];
//     echo '</td><td>';
//     echo $row["actor"];
//     echo '</td><td>';
//     echo $row["link"];
//     echo '</td><td>';
//     echo $row["depict"];
//     echo '</td></tr>';
// };
// echo "</table>";
?>