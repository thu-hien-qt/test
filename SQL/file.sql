create database if not exists Price;
use Price;
CREATE TABLE if not exists computer (
    ID INT AUTO_INCREMENT,
    Brand VARCHAR(255),
    Model VARCHAR(255),
    CPU FLOAT,
    RAM INT,
    Price INT,
    Update_at DATETIME default now() NOT NULL,
    Create_at DATETIME default now() NOT NULL,
    PRIMARY KEY (ID),
    CONSTRAINT UC_computer UNIQUE (Brand,Model)
);
INSERT INTO computer (Brand, Model, CPU, RAM, Price) VALUES
("HP", "zbook", 4.5, 16, 20000000),
("Lenovo", "Y300", 3,4,10000000),
("MSI", "M200", 4, 8, 15000000),
("Apple", "M1", 3, 8, 15000000),
("Apple", "M2", 4.5, 16, 25000000),
("Apple", "M3", 5, 32, 30000000);
SELECT * FROM computer ORDER BY Price DESC LIMIT 1;
SELECT * FROM computer ORDER BY Price LIMIT 1;
SELECT * FROM computer WHERE Price <= 20000000 ORDER BY CPU DESC;
SELECT * FROM computer ORDER BY Price ASC, CPU DESC;
SELECT price FROM computer ORDER BY Price LIMIT 1;
SELECT AVG(CPU)
FROM computer
WHERE Brand = "Apple";
SELECT COUNT(Brand)
FROM computer
WHERE Brand= "Apple";
ALTER TABLE computer
ADD Quantity INT;
UPDATE computer
SET Quantity = 10 WHERE Model = "zbook";
UPDATE computer
SET Quantity = 3 WHERE Model = "Y300";
UPDATE computer
SET Quantity = 0 WHERE Model = "M200";
UPDATE computer
SET Quantity = 5 WHERE Model = "M1";
UPDATE computer
SET Quantity = 6 WHERE Model = "M2";
UPDATE computer
SET Quantity = 0 WHERE Model = "M3";
SELECT Sum(Quantity)
FROM computer;
SELECT SUM(Quantity)
FROM computer
WHERE Brand LIKE "Apple";
SELECT ID, Brand, Model, CPU, RAM, (Price * Quantity)Valuee
FROM computer;
SELECT SUM(Price * Quantity)
FROM computer;
SELECT Brand 
FROM computer 
GROUP BY Brand
HAVING COUNT(Brand) =1;
SELECT Brand 
FROM computer WHERE Quantity >0
GROUP BY Brand;