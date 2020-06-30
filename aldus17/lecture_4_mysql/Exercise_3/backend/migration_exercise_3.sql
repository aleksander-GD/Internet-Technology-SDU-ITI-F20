DROP DATABASE IF EXISTS db_exercise_3;
CREATE DATABASE IF NOT EXISTS db_exercise_3;
USE db_exercise_3;

DROP TABLE IF EXISTS author;
DROP TABLE IF EXISTS book;
DROP TABLE IF EXISTS publisher;

DROP VIEW IF EXISTS view_combination;

CREATE TABLE author (
	author_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	author_name VARCHAR(100),
	author_title VARCHAR(100),
	PRIMARY KEY (author_id)
);

CREATE TABLE publisher (
	publisher_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	publisher_name VARCHAR(100),
	publisher_country VARCHAR(100),
	PRIMARY KEY (publisher_id)
);

CREATE TABLE book (
	book_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	author_id INT UNSIGNED NOT NULL,
	publisher_id INT UNSIGNED NOT NULL,
	book_title VARCHAR(100),
	book_description TEXT,
	PRIMARY KEY (book_id),
	FOREIGN KEY (author_id) 
	REFERENCES author (author_id) 
	ON UPDATE CASCADE 
	ON DELETE CASCADE,
	FOREIGN KEY (publisher_id) 
	REFERENCES publisher (publisher_id)
	ON UPDATE CASCADE 
	ON DELETE CASCADE
);

INSERT INTO author (author_name, author_title) VALUES ('Flannery O Connor', 'Dr.');
INSERT INTO author (author_name, author_title) VALUES ('Philip Roth', 'Asst. Prof.');
INSERT INTO author (author_name, author_title) VALUES ('Erica Jong', 'Prof.');
INSERT INTO author (author_name, author_title) VALUES ('Thomas Keller', 'Prof.');
INSERT INTO author (author_name, author_title) VALUES ('Jean Rhys', 'Dr.');
INSERT INTO author (author_name, author_title) VALUES ('Paul Kalanithi', 'Asst. Prof.');

INSERT INTO publisher (publisher_name, publisher_country) VALUES ('MGE', 'Ireland');
INSERT INTO publisher (publisher_name, publisher_country) VALUES ('Blue Fly Publisher', 'England');
INSERT INTO publisher (publisher_name, publisher_country) VALUES ('Southern city books', 'USA');

INSERT INTO book(author_id, publisher_id, book_title, book_description) SELECT author_id, (SELECT publisher_id FROM publisher WHERE publisher.publisher_name = 'MGE'), 'The Complete Stories', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet placerat massa, quis dapibus eros posuere in.' FROM author WHERE author.author_name = 'Flannery O Connor';
INSERT INTO book(author_id, publisher_id, book_title, book_description) SELECT author_id, (SELECT publisher_id FROM publisher WHERE publisher.publisher_name = 'MGE'), 'Stories of Life', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet placerat massa, quis dapibus eros posuere in.' FROM author WHERE author.author_name = 'Flannery O Connor';
INSERT INTO book(author_id, publisher_id, book_title, book_description) SELECT author_id, (SELECT publisher_id FROM publisher WHERE publisher.publisher_name = 'Blue Fly Publisher'), 'Letting Go', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet placerat massa, quis dapibus eros posuere in.' FROM author WHERE author.author_name = 'Philip Roth';
INSERT INTO book(author_id, publisher_id, book_title, book_description) SELECT author_id, (SELECT publisher_id FROM publisher WHERE publisher.publisher_name = 'Blue Fly Publisher'), 'Fear of Flying', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet placerat massa, quis dapibus eros posuere in.' FROM author WHERE author.author_name = 'Erica Jong';
INSERT INTO book(author_id, publisher_id, book_title, book_description) SELECT author_id, (SELECT publisher_id FROM publisher WHERE publisher.publisher_name = 'Southern city books'), 'The French Laundry Cookbook', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet placerat massa, quis dapibus eros posuere in.' FROM author WHERE author.author_name = 'Thomas Keller';
INSERT INTO book(author_id, publisher_id, book_title, book_description) SELECT author_id, (SELECT publisher_id FROM publisher WHERE publisher.publisher_name = 'Southern city books'), 'Wide Sargasso Sea', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet placerat massa, quis dapibus eros posuere in.' FROM author WHERE author.author_name = 'Jean Rhys';
INSERT INTO book(author_id, publisher_id, book_title, book_description) SELECT author_id, (SELECT publisher_id FROM publisher WHERE publisher.publisher_name = 'MGE'), 'When Breath Becomes Air', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet placerat massa, quis dapibus eros posuere in.' FROM author WHERE author.author_name = 'Paul Kalanithi';

CREATE VIEW view_combination
AS SELECT a.author_name, a.author_title, b.book_title, p.publisher_name, p.publisher_country
FROM author a, publisher p, book b
WHERE a.author_id=b.author_id
AND p.publisher_id=b.publisher_id;