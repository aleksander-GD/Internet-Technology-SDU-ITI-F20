DROP DATABASE IF EXISTS db_exercise_2;
CREATE DATABASE IF NOT EXISTS db_exercise_2;
USE db_exercise_2;

DROP TABLE IF EXISTS author;
DROP TABLE IF EXISTS book;
DROP TABLE IF EXISTS publisher;

CREATE TABLE author (
	author_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	author_name varchar(100),
	author_title varchar(100),
	PRIMARY KEY (author_id)
);

CREATE TABLE book (
	book_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	author_id INT(10) UNSIGNED NOT NULL,
	publisher_id INT(10) UNSIGNED NOT NULL,
	book_title varchar(100),
	book_year INT,
	PRIMARY KEY (book_id),
	FOREIGN KEY (author_id) REFERENCES author(author_id)
	FOREIGN KEY (publisher_id) REFERENCES publisher(publisher_id)
);

CREATE TABLE publisher (
	publisher_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	book_id INT(10) UNSIGNED NOT NULL,
	publisher_name varchar(100),
	publisher_country varchar(100),
	PRIMARY KEY (publisher_id),
	FOREIGN KEY (book_id) REFERENCES book(book_id)
);

INSERT INTO author (author_name, author_title) VALUES ('Flannery O Connor', 'The Complete Stories');
INSERT INTO author (author_name, author_title) VALUES ('Flannery O Connor', 'Stories of Life');
INSERT INTO author (author_name, author_title) VALUES ('Philip Roth', 'Letting Go');
INSERT INTO author (author_name, author_title) VALUES ('Erica Jong', 'Fear of Flying');
INSERT INTO author (author_name, author_title) VALUES ('Thomas Keller', 'The French Laundry Cookbook');
INSERT INTO author (author_name, author_title) VALUES ('Jean Rhys', 'Wide Sargasso Sea');
INSERT INTO author (author_name, author_title) VALUES ('Paul Kalanithi', 'When Breath Becomes Air');



INSERT INTO book(author_id, book_title, book_year) SELECT author_id, author_title, 2005 FROM author WHERE author.author_name = 'Flannery O Connor';
INSERT INTO book(author_id, book_title, book_year) SELECT author_id, author_title, 2011 FROM author WHERE author.author_name = 'Philip Roth';
INSERT INTO book(author_id, book_title, book_year) SELECT author_id, author_title, 2003 FROM author WHERE author.author_name = 'Erica Jong';
INSERT INTO book(author_id, book_title, book_year) SELECT author_id, author_title, 2015 FROM author WHERE author.author_name = 'Thomas Keller';
INSERT INTO book(author_id, book_title, book_year) SELECT author_id, author_title, 2005 FROM author WHERE author.author_name = 'Jean Rhys';
INSERT INTO book(author_id, book_title, book_year) SELECT author_id, author_title, 2008 FROM author WHERE author.author_name = 'Paul Kalanithi';