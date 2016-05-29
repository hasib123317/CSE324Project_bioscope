DROP DATABASE IF EXISTS cineplex;

CREATE DATABASE cineplex;

USE cineplex;

CREATE TABLE user (
	id INTEGER(10) AUTO_INCREMENT,
	name VARCHAR(30),
	email VARCHAR(30),
	book_count INTEGER(5),
	phone_no VARCHAR(20),
	isadmin BOOLEAN,
	password CHAR(60),
	remember_token CHAR(100),

	PRIMARY KEY(id)
);

CREATE TABLE movie (
	id INTEGER(10) AUTO_INCREMENT,
	name VARCHAR(50),
	genre VARCHAR(50),
	rating DOUBLE(5,2),
	certificate VARCHAR(10),

	PRIMARY KEY(id)
);

CREATE TABLE hall (
	id INTEGER(5) AUTO_INCREMENT,
	seat INTEGER(3),
	ac BOOLEAN,
	img VARCHAR(100),
	premium_ticket_price INTEGER(4),
	regular_ticket_price INTEGER(4),

	PRIMARY KEY(id)
);

CREATE TABLE shows (
	id INTEGER(10) AUTO_INCREMENT,
	movie_id INTEGER(10),
	hall_id INTEGER(5),
	start_time DATE,
	end_time DATE,
	language VARCHAR(20),
	available_seat INTEGER(3),

	PRIMARY KEY(id),
	FOREIGN KEY(movie_id) REFERENCES movie(id), 
	FOREIGN KEY(hall_id) REFERENCES hall(id)
);

CREATE TABLE ticket (
	id INTEGER(10), 
	show_id INTEGER(10),
	hall_id INTEGER(5),
	seat_no INTEGER(3),
	class VARCHAR(10),

	PRIMARY KEY(id, show_id),
	FOREIGN KEY(show_id) REFERENCES shows(id),
	FOREIGN KEY(hall_id) REFERENCES hall(id)
);

CREATE TABLE booking (
	user_id INTEGER(10),
	ticket_id INTEGER(10),
	show_id INTEGER(10),
	booking_date DATE,
	payment_no INTEGER(10),

	PRIMARY KEY(user_id, ticket_id, show_id),
	FOREIGN KEY(user_id) REFERENCES user(id),
	FOREIGN KEY(ticket_id) REFERENCES ticket(id),
	FOREIGN KEY(show_id) REFERENCES shows(id)
);

###############################################################################

INSERT INTO user VALUES('1', 'Jaiaid', 'jaiaidmobin@gmail.com', 0, '123456', false, '$2y$10$iWnoMjLM3xC3DszJjezwaOB1SXTcp9mZPXPb73XlicbfZI4Ju2z7S', '');
INSERT INTO user VALUES('2', 'Adnan', 'adnan@gmail.com', 0, '123456', true, '$2y$10$iWnoMjLM3xC3DszJjezwaOB1SXTcp9mZPXPb73XlicbfZI4Ju2z7S', '');


INSERT INTO hall VALUES('1', 150, false, '', 100, 200);
INSERT INTO hall VALUES('2', 150, true, '', 200, 300);
