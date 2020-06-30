DROP DATABASE IF EXISTS db_exercise_1;
CREATE DATABASE IF NOT EXISTS db_exercise_1;
USE db_exercise_1;

DROP TABLE IF EXISTS author;
DROP TABLE IF EXISTS book;

CREATE TABLE author (
	author_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	author_name VARCHAR(100),
	author_title VARCHAR(100),
	PRIMARY KEY (author_id)
);

INSERT INTO author (author_name, author_title) VALUES ('Flannery O Connor', 'Dr.');
INSERT INTO author (author_name, author_title) VALUES ('Philip Roth', 'Asst. Prof.');
INSERT INTO author (author_name, author_title) VALUES ('Erica Jong', 'Prof.');
INSERT INTO author (author_name, author_title) VALUES ('Thomas Keller', 'Prof.');
INSERT INTO author (author_name, author_title) VALUES ('Jean Rhys', 'Dr.');
INSERT INTO author (author_name, author_title) VALUES ('Paul Kalanithi', 'Asst. Prof.');

CREATE TABLE book (
	book_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	author_id INT(10) UNSIGNED NOT NULL,
	book_title VARCHAR(100),
	book_year INT,
	PRIMARY KEY (book_id),
	FOREIGN KEY (author_id) REFERENCES author(author_id)
);

INSERT INTO book(author_id, book_title, book_year) SELECT author_id, 'The Complete Stories', 2005 FROM author WHERE author.author_name = 'Flannery O Connor';
INSERT INTO book(author_id, book_title, book_year) SELECT author_id, 'Stories of Life', 2011 FROM author WHERE author.author_name = 'Flannery O Connor';
INSERT INTO book(author_id, book_title, book_year) SELECT author_id, 'Letting Go', 2003 FROM author WHERE author.author_name = 'Philip Roth';
INSERT INTO book(author_id, book_title, book_year) SELECT author_id, 'Fear of Flying', 2003 FROM author WHERE author.author_name = 'Erica Jong';
INSERT INTO book(author_id, book_title, book_year) SELECT author_id, 'The French Laundry Cookbook', 2015 FROM author WHERE author.author_name = 'Thomas Keller';
INSERT INTO book(author_id, book_title, book_year) SELECT author_id, 'Wide Sargasso Sea', 2005 FROM author WHERE author.author_name = 'Jean Rhys';
INSERT INTO book(author_id, book_title, book_year) SELECT author_id, 'When Breath Becomes Air', 2008 FROM author WHERE author.author_name = 'Paul Kalanithi';