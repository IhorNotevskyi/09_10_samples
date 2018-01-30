CREATE TABLE `0910_shop`.users
(
id INT PRIMARY KEY AUTO_INCREMENT,
login VARCHAR(255) NOT NULL,
password VARCHAR(32) NOT NULL
);
CREATE UNIQUE INDEX users_login_uindex ON `0910_shop`.users (login);