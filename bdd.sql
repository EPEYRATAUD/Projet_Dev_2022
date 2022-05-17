CREATE DATABASE IF NOT EXISTS mysterynumber;

USE mysterynumber;

CREATE TABLE IF NOT EXISTS users
(
    Id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(50),
    password VARCHAR(50),
    email    VARCHAR(50),
    avatar   VARCHAR(50)
);

INSERT INTO users (username, password, email, avatar)
VALUES ('admin', 'admin', 'admin@mail.com', 'default.png');