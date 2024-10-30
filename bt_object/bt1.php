<?php
class Genre {
    protected $genreName;
    public function __construct($name)
    {
        $this->genreName = $name;
    }

    public function getName() {
        return $this->genreName;
    }

    public function setName($name) {
        $this->genreName = $name;
    }

}

class Person {
    protected $name;
    protected $gender;
    protected $birthday;

    public function __construct($name, $gender, $birthday)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this-> birthday = $birthday;
    }

    public function getname() {
        return $this->name;
    }

    public function getgender() {
        return $this->gender;
    }

    public function getbirthday() {
        return $this->birthday;
    }
    
    public function setname($name) {
        $this->name = $name;
    }

    public function setgender($gender) {
        $this->gender = $gender;
    }
        
    public function setbirthday($birthday) {
        $this-> birthday = $birthday;
    }
}

class movie {
    protected $title;
    protected $genres = [];
    protected $director;
    protected $actors = [];
    protected $link;
    protected $description;

    public function __construct($title, $director, $link, $description)
    {
        $this->title = $title;
        $this->director = $director;
        $this->link = $link;
        $this->description = $description;
    }

    public function gettitle() {
        return $this->title;
    }

    public function settitle($title) {
        $this->title = $title;
    }

    public function getdirector() {
        return $this->director;
    }

    public function setdirector($director) {
        $this->director = $director;
    }

    public function getlink() {
        return $this->link;
    }

    public function setlink($link) {
        $this->link = $link;
    }

    public function getdescrip() {
        return $this->description;
    }

    public function setdescrip($description) {
        $this->description = $description;
    }

    public function addgenre(Genre $genre) {
        $this->genres[] = $genre;
    }

    public function getgenres() {
        
        $genres = [];
        foreach ($this->genres as $genre ) {
            $genres[] = $genre->getName();
        }
        $genres = implode(",", $genres);
        return $genres;

    }

    public function addactor(Person $person) {
        $this->actors[] = $person;
    }

    public function getactors() {
        $actors = [];
        foreach ($this->actors as $actor) {
            $actors[] = $actor->getname();
        }
        $actors = implode(", " , $actors);
        return $actors;
    }
}
$director1 = new Person("Eric Kipke", "director", 1990);
$director2 = new Person("Kelsey Mann", "director", 1989);

$actor1 = new Person("Karl", "actor", 1992);
$actor2 = new Person("Anthony", "actor", 2001);
$actor3 = new Person("Amy", "actor", 1993);
$actor4 = new Person("Olivia", "actor", 1995);


$movie[] = new movie("The boys", $director1, "https://www.imdb.com/title/tt1190634/?ref_=sr_t_1", "A group of vigilantes set out to take down corrupt superheroes who abuse their superpowers." ); 
$movie[] = new movie("Inside Out 2", $director2, "https://www.imdb.com/title/tt22022452/?ref_=sr_i_2", "Follows Riley, in her teenage years, encountering new emotions.");


$genre1 = new Genre("comedy");
$genre2 = new Genre("horror");
$genre3 = new genre("action");

$movie[0]->addgenre($genre1);
$movie[0]->addgenre($genre2);
$movie[0]->addactor($actor1);
$movie[0]->addactor($actor2);

$movie[1]->addgenre($genre2);
$movie[1]->addgenre($genre3);
$movie[1]->addactor($actor2);
$movie[1]->addactor($actor3);
$movie[1]->addactor($actor4);

?>
<style> 
    table, th, td {
        border: 1px solid black;
         border-collapse: collapse;
    }

    .first {
        text-align: center;
    }

</style>
<table >
    <tr class="first">
        <td>Title</td>
        <td>Genres</td>
        <td>Director</td>
        <td>Actor</td>
        <td>Link</td>
        <td>Description</td>
    </tr>
    <?php
    foreach ($movie as $val) {
        echo "<tr>";
        echo "<td>". $val->gettitle() . "</td>";
        echo "<td>". $val->getgenres() . "</td>";
        echo "<td>". $val->getdirector()->getname() . "</td>";
        echo "<td>". $val->getactors() . "</td>";
        echo "<td>". $val->getlink() . "</td>";
        echo "<td>". $val->getdescrip() . "</td>";
        echo "</tr>";
    }
    ?>

</table>

