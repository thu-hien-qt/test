<?php
require_once "movie_pdo.php";
$statement = $pdo->query("SELECT * FROM film ");
echo "<table border= '1'>";
while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr><td>';
    echo $row["filmID"];
    echo '</td><td>';
    echo $row["name"];
    echo '</td><td>';
    echo $row["genreID"];
    echo '</td><td>';
    echo $row["manufacture"];
    echo '</td><td>';
    echo $row["director"];
    echo '</td><td>';
    echo $row["link"];
    echo '</td><td>';
    echo $row["depict"];
    echo '</td></tr>';
};
echo "</table>";
?>