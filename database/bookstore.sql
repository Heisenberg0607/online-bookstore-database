-- Online Bookstore coursework: anonymized schema and fictional local demo books
-- MySQL 5.7+; no user, cart, rating, order, or password data shipped
-- Import into a newly created, empty bookstore database.
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
CREATE TABLE IF NOT EXISTS `book` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(50) NOT NULL,
  `title` text,
  `price` float DEFAULT '0',
  `author` text,
  `bookimage` text,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `publisher` text,
  `page` int(11) DEFAULT '0',
  `language` text,
  `published_date` date DEFAULT NULL,
  `genre` text,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `cart` (
  `userid` varchar(100) NOT NULL,
  `bookid` int(11) NOT NULL,
  `title` text,
  `quantity` int(11) NOT NULL,
  `amount` float NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`,`bookid`),
  KEY `bookid` (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `bookid` int(11) NOT NULL,
  `title` text,
  `quantity` int(11) NOT NULL,
  `amount` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderid`),
  KEY `bookid` (`bookid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `rate` (
  `userid` varchar(100) NOT NULL,
  `bookid` int(11) NOT NULL,
  `review` text,
  `rating` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`,`bookid`),
  KEY `bookid` (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `user` (
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `age` smallint(4) NOT NULL DEFAULT '0',
  `contact` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `permission` varchar(4) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO `book` (`isbn`,`title`,`price`,`author`,`bookimage`,`description`,`publisher`,`page`,`language`,`published_date`,`genre`) VALUES
('9780000000001', 'Practical Database Design', 24.5, 'A. Kim', 'noimage.png', 'A concise guide to relational tables and keys.', 'Tech Classroom', 220, 'English', '2021-01-15', 'Technology'),
('9780000000002', 'Applied SQL Patterns', 28.0, 'J. Park', 'noimage.png', 'Queries, joins and aggregation in everyday applications.', 'Tech Classroom', 312, 'English', '2020-07-09', 'Technology'),
('9780000000003', 'Thinking in Systems', 18.9, 'M. Chen', 'noimage.png', 'A fictional introduction to systems thinking.', 'Campus Press', 195, 'English', '2019-04-12', 'Education'),
('9780000000004', 'Data Modeling Basics', 21.75, 'S. Lee', 'noimage.png', 'How to plan a simple relational schema.', 'Campus Press', 235, 'English', '2021-11-20', 'Technology'),
('9780000000005', 'Web Development Fundamentals', 26.0, 'R. Song', 'noimage.png', 'An overview of backend web programming concepts.', 'Open Learning', 280, 'English', '2022-01-03', 'Technology'),
('9780000000006', 'Interface Design Notes', 15.95, 'D. Wu', 'noimage.png', 'Foundations of clear interfaces and navigation.', 'Open Learning', 176, 'English', '2018-09-08', 'Design'),
('9780000000007', 'A Small Bookshop', 12.4, 'L. Han', 'noimage.png', 'A fictional story set in a neighborhood bookstore.', 'Fictional House', 188, 'English', '2021-06-18', 'Fiction'),
('9780000000008', 'Project Team Handbook', 17.1, 'Y. Fang', 'noimage.png', 'A fictional handbook about student team projects.', 'Campus Press', 203, 'English', '2020-02-22', 'Education');


ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`bookid`) REFERENCES `book` (`bookid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`bookid`) REFERENCES `book` (`bookid`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`bookid`) REFERENCES `book` (`bookid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
