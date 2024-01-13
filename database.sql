DROP TABLE IF EXISTS matatuCompanies;

CREATE TABLE
    matatuCompanies(
        id INT auto_increment PRIMARY KEY,
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

SELECT
    matatuCompanies.id AS matatu_company_id,
    matatuCompanies.name AS matatu_company_name,
    matatuCompanies.latitude,
    matatuCompanies.longitude,
    matatuCompanies.city AS departure_city,
    departure.name AS departure_name,
    departure.latitude AS departure_latitude,
    departure.longitude AS departure_longitude,
    routes.id AS route_id,
    routes.price,
    routes.eta,
    destination.name AS destination_name,
    destination.latitude AS destination_latitude,
    destination.longitude AS destination_longitude,
    destination.city AS destination_city
FROM
    matatuCompanies
    JOIN routes ON matatuCompanies.id = routes.departure_id
    JOIN matatuCompanies AS departure ON routes.departure_id = departure.id
    JOIN matatuCompanies AS destination ON routes.destination_id = destination.id
WHERE
    departure.name = 'Mololine Sacco'
    AND destination.name = 'Kabarak University'
LIMIT 100