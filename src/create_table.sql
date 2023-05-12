-- Delete BDD portfolio or tables
DROP TABLE contacts;
DROP DATABASE portfolio;

-- Create the BDD portfolio
CREATE DATABASE portfolio;

-- Use the portfolio BDD
USE portfolio;

-- Create the contacts table
CREATE TABLE IF NOT EXISTS contacts (
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(320) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    sent DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB AUTO_INCREMENT = 13 DEFAULT CHARSET = utf8;