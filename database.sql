DROP TABLE IF EXISTS matatuCompanies;

CREATE TABLE matatuCompanies(
    id INT auto_increment PRIMARY KEY,
    name VARCHAR(50),
    latitude DECIMAL(10, 8),
    longitude DECIMAL(11, 8),
    city VARCHAR(10)
);


DROP TABLE IF EXISTS managers;

CREATE TABLE managers(
    id int AUTO_INCREMENT PRIMARY KEY,
    company_id INT,
    first_name VARCHAR(20),
    last_name VARCHAR(20),
    username VARCHAR(20),
    password VARCHAR(15)
);