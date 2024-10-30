CREATE DATABASE IF NOT exists movie;

USE movie;

CREATE TABLE IF NOT exists genres (
    genreID INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255)
);

CREATE TABLE IF NOT exists person (
    personID INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    gender enum("male", "female", "other"),
    birthday YEAR,
    role enum("actor", "director")
);


CREATE TABLE IF NOT exists film (
    filmID INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    manufacture YEAR,
    directorID INT,
    link VARCHAR(255),
    img VARCHAR (255),
    `description`  VARCHAR(255),
    CONSTRAINT FOREIGN KEY (directorID) REFERENCES person (personID)
    ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE IF NOT exists film_actor (
    filmID INT,
    actorID INT,
    PRIMARY KEY (actorID, filmID),
    CONSTRAINT FOREIGN KEY (actorID) REFERENCES person (personID)
    ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT FOREIGN KEY (filmID) REFERENCES film (filmID)
    ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE IF NOT exists film_genre (
    filmID INT,
    genreID INT,
    PRIMARY KEY  (filmID, genreID),
    CONSTRAINT FOREIGN KEY (filmID) REFERENCES film (filmID)
    ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT FOREIGN KEY (genreID) REFERENCES genres (genreID)
    ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE if not exists users (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    username VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE if not exists comments (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    filmID INT,
    messaage VARCHAR(255),
    `datetime` datetime,
    CONSTRAINT FOREIGN KEY (filmID) REFERENCES film (filmID)
    ON DELETE RESTRICT ON UPDATE RESTRICT,
)

INSERT INTO genres (name) VALUES ("Comedy"), ("Horror"), ("Romance"), ("Cartoon"), ("Action");
INSERT INTO person (name, gender, birthday, role) VALUES ("Karl", "male", "1990", "director"), 
("Jack", "male", "2000", "actor"), 
("Anthony", "male", "1998", "actor"), 
("Amy", "female", "1990", "actor"), 
("Eric", "female", "2000", "director"),
("Jessie", "female", "2001", "actor"), 
("Olivia", "female", "1992", "actor"), 
("Kyle", "male", "1993", "actor"), 
("Kelsey", "female", "1990", "director"),
("Sonia", "female", "1995", "actor"), 
("Emma", "female", "1997", "actor"), 
("Maya", "female", "1998", "actor"),
("Arkasa", "male", "1999", "director"),
("Ryan", "male", "1989", "director");
INSERT INTO film (title, manufacture, directorID, link, description )
VALUES 
    ("The boys", 2019, 1, "https://www.imdb.com/title/tt1190634/?ref_=sr_t_1","A group of vigilantes set out to take down corrupt superheroes who abuse their superpowers."),
    ("Inside Out 2", 2024, 5, "https://www.imdb.com/title/tt22022452/?ref_=sr_i_2", "Follows Riley, in her teenage years, encountering new emotions."),
    ("The First Omen", 2024, 1, "https://www.imdb.com/title/tt5672290/?ref_=sr_t_10", "A young American woman is sent to Rome to begin a life of service to the church, but encounters a darkness that causes her to question her faith and uncovers a terrifying conspiracy that hopes to bring about the birth of evil incarnate."),
    ("Smile", 2022, 9, "https://www.imdb.com/title/tt15474916/?ref_=sr_t_9", "After witnessing a bizarre, traumatic incident involving a patient, a psychiatrist becomes increasingly convinced she is being threatened by an uncanny entity."),
    ("House of the Dragon", 2022, 13, "https://www.imdb.com/title/tt11198330/?ref_=sr_t_1", "An internal succession war within House Targaryen at the height of its power, 172 years before the birth of Daenerys Targaryen.");
INSERT INTO film_actor(filmID, actorID) VALUES (1,2), (1,10), (1,3), (2,6), (2,2), (2,7), (3,4), (3,6), (3,12), (4,2), (4,4), (4,8), (5,10), (5,6), (5,11);
INSERT INTO film_genre (filmID, genreID) VALUES (1,2),(1,3),(2,1),(3,4),(3,1),(4,2),(4,5),(5,2);
INSERT INTO users (name, username, password) VALUES ("Hiền", "hien1", "123"),
("Hà", "haid2", "abc"),
("Phong", "phongid3", "123"),
("Phương", "phuongid4", "abc");


SELECT 
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
    