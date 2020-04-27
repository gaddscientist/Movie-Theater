DROP TABLE IF EXISTS employee;
DROP TABLE IF EXISTS transaction;
DROP TABLE IF EXISTS customer;
DROP TABLE IF EXISTS theater;
DROP TABLE IF EXISTS ticket;
DROP TABLE IF EXISTS shows;
DROP TABLE IF EXISTS cinema;
DROP TABLE IF EXISTS person;
DROP TABLE IF EXISTS home_address;
DROP TABLE IF EXISTS movie;


CREATE TABLE person (
    person_id INT(6) AUTO_INCREMENT,
    email VARCHAR(256) NOT NULL,
    first_name VARCHAR(256) NOT NULL,
    last_name VARCHAR(256) NOT NULL,
    Phone VARCHAR(20) NOT NULL,
    Birthdate DATE NOT NULL,
    PRIMARY KEY (person_id)
);

CREATE TABLE home_address (
    address_id INT(6) AUTO_INCREMENT,
    street_address VARCHAR(256) NOT NULL,
    city VARCHAR(256) NOT NULL,
    state VARCHAR(256) NOT NULL,
    zip VARCHAR(256) NOT NULL,
    PRIMARY KEY (address_id)    
);

CREATE TABLE cinema (
    cinema_id INT(6) AUTO_INCREMENT,
    manager_id INT(6),
    location_address INT(6),
    Phone INT(10),
    PRIMARY KEY (cinema_id),
    FOREIGN KEY (manager_id) References person (person_id)
);

CREATE TABLE employee (
    employee_id INT(6) AUTO_INCREMENT,
    wage DECIMAL(8,2) CHECK (wage > 0),
    hire_date DATE NOT NULL,
    ssn INT(9) NOT NULL,
    address_id INT (6),
    store_number INT(6),
    manager_id INT(6),
    PRIMARY KEY (employee_id),
    FOREIGN KEY (employee_id) References person (person_id),
    FOREIGN KEY (address_id) References home_address (address_id),
    FOREIGN KEY (store_number) References cinema (cinema_id)
);

CREATE TABLE customer (
    customer_id INT(6) AUTO_INCREMENT,
    membership_number INT(6),
    join_date DATE,
    points INT(7),
    favorite_cinema INT(6),
    PRIMARY KEY (customer_id),
    FOREIGN KEY (customer_id) References person (person_id),
    FOREIGN KEY (favorite_cinema) References cinema (cinema_id)
);


CREATE TABLE theater (
    cinema_id INT(10) AUTO_INCREMENT,
    theater_number INT(2),
    capacity INT(3),
    PRIMARY KEY (cinema_id, theater_number),
    FOREIGN KEY (cinema_id) References cinema (cinema_id)
);

CREATE TABLE movie (
    movie_id INT(6) AUTO_INCREMENT,
    movie_name VARCHAR(256) NOT NULL,
    duration DECIMAL(5, 2),
    rating_mpaa CHAR(4),
    rating_imdb DECIMAL(4, 2),
    director VARCHAR(30) NOT NULL,
    genre VARCHAR(20),
    PRIMARY KEY (movie_id)
);


CREATE TABLE shows (
    show_id INT(6) AUTO_INCREMENT,
    cinema_id INT(6),
    movie_id INT(6),
    start_time TIME,
    show_date DATE,
    num_tickets INT(3),
    PRIMARY KEY (show_id),
    FOREIGN KEY (cinema_id) References cinema (cinema_id),
    FOREIGN KEY (movie_id) References movie (movie_id)
);

CREATE TABLE ticket (
    ticket_id INT(6) AUTO_INCREMENT,
    show_id INT(6),
    start_time TIME,
    price DECIMAL(4, 2),
    ticket_type Char(6),
    point_value INT(2),
    PRIMARY KEY (ticket_id),
    FOREIGN KEY (show_id) References shows (show_id)
);

CREATE TABLE transaction (
    transaction_id INT(6) AUTO_INCREMENT,
    ticket_id INT(6),
    cinema_id INT(6),
    customer_id INT(6),
    payment_form Char(10),
    transaction_date DATE,
    PRIMARY KEY (transaction_id),
    FOREIGN KEY (ticket_id) References ticket (ticket_id),
    FOREIGN KEY (cinema_id) References cinema (cinema_id),
    FOREIGN KEY (customer_id) References customer (customer_id)
);





-- Are these even necessary???
CREATE TABLE supervisor (
    supervisor_id INT(10),
    Worker (int(10)),
PRIMARY KEY (Boss),
PRIMARY KEY (Worker),
FORIEGN KEY (Boss) References (Employee(ID)),
FORIEGN KEY (Worker) References (Employee(ID))
);

Create Table Manager (
Manager(int(10)),
Cinema (int(10)),
Username (Varchar(256)),
Password (Varchar(256)),
PRIMARY KEY (Manager),
FORIEGN KEY (Manager) References (Employee(ID)),
FORIEGN KEY (Cinema) References (Cinema(ID))
);

CREATE TABLE Favorite(
Person (int(10)),
Cinema (int(10)),
PRIMARY KEY (Person),
FORIEGN KEY (Person) References (Person(ID)),
FORIEGN KEY (Cinema) References (Cinema(ID))
);

Create Table works (
    employee_id (int(10)),
    Cinema (int(10)),
    PRIMARY KEY (employee_id),
    FORIEGN KEY (employee_id) References employee (employee_id),
    FORIEGN KEY (cinema) References cinema (cinema_id)
);