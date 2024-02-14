DROP TABLE IF EXISTS matatuCompanies;

CREATE TABLE
    matatuCompanies(
        id INT PRIMARY KEY,
        name VARCHAR(50),
        latitude DECIMAL(10, 8),
        longitude DECIMAL(11, 8),
        city VARCHAR(10)
    );

DROP TABLE IF EXISTS managers;

CREATE TABLE
    managers(
        id int AUTO_INCREMENT PRIMARY KEY,
        company_id INT,
        first_name VARCHAR(20),
        last_name VARCHAR(20),
        username VARCHAR(20),
        password VARCHAR(15)
    );

DROP TABLE IF EXISTS routes;

CREATE TABLE
    routes(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
        departure_id INT,
        destination_id INT,
        price INT,
        eta VARCHAR(6)
    );

DROP TABLE IF EXISTS travellers;

CREATE TABLE travellers(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    first_name VARCHAR(10),
    last_name VARCHAR(10),
    username VARCHAR(15),
    email VARCHAR(30),
    password VARCHAR(20),
    age INT
);

DROP TABLE IF EXISTS rating;

CREATE TABLE rating(
  id INT AUTO_INCREMENT PRIMARY KEY,
  route_id INT,
  rating INT,
  user_id INT,
  feedback VARCHAR(255)
);