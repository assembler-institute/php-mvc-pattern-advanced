--
-- Database creation
--

DROP DATABASE IF EXISTS mvc_advanced;
CREATE DATABASE mvc_advanced;
USE mvc_advanced;

--
-- Tables creation
--

CREATE TABLE `contents` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) UNIQUE,
  `text` TEXT DEFAULT NULL
);


--
-- Insert data for "content" table
--

INSERT INTO `contents` (`name`, `email`, `text`) VALUES
('Puchu', 'puchu@assemblerschool.com', 'I <3 you Puchu'),
('Merli', 'merli@assemblerschool.com', 'Merli we love you'),
('Pau', 'pau2@assemblerschool.com', 'new emaill jeje JO!');
