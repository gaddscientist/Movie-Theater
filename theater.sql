-- UNCOMMENT TO DELETE ALL TABLES BEFORE RECREAT
SET foreign_key_checks = 0;
DROP TABLE IF EXISTS employee;
DROP TABLE IF EXISTS transaction;
DROP TABLE IF EXISTS customer;
DROP TABLE IF EXISTS theater;
DROP TABLE IF EXISTS ticket;
DROP TABLE IF EXISTS shows;
DROP TABLE IF EXISTS manager;
DROP TABLE IF EXISTS cinema;
DROP TABLE IF EXISTS address;
DROP TABLE IF EXISTS movie;
SET foreign_key_checks = 1;


CREATE TABLE address (
    address_id INT(6) AUTO_INCREMENT,
    street_address VARCHAR(256) NOT NULL,
    city VARCHAR(256) NOT NULL,
    state VARCHAR(256) NOT NULL,
    zip VARCHAR(256) NOT NULL,
    PRIMARY KEY (address_id)    
);

INSERT INTO address VALUES ( 1000, '8217 Annadale St.', 'Mobile', 'AL', '36605');
INSERT INTO address VALUES ( 1001, '592 Cedar Street', 'Madison Heights', 'MI', '48071');
INSERT INTO address VALUES ( 1002, '820 NW. Country Club Lane', 'Cheshire', 'CT', '06410');
INSERT INTO address VALUES ( 1003, '9599 Somerset Street', 'Sicklerville', 'NJ', '08081');
INSERT INTO address VALUES ( 1004, '7364 Mechanic Drive Lake', 'Jackson', 'TX', '77566');
INSERT INTO address VALUES ( 1005, '30 Poor House St.', 'Alabaster', 'AL', '35007');
INSERT INTO address VALUES ( 1006, '8286 Saxon Road', 'Omaha', 'NE', '68107'); 
INSERT INTO address VALUES ( 1007, '7232 W. Railroad Street Huntington', 'Station', 'NY', '11746');
INSERT INTO address VALUES ( 1008, '95 Fairground Rd.', 'Troy', 'NY', '12180');
INSERT INTO address VALUES ( 1009, '330 Magnolia Court Monroe', 'Township', 'NJ', '08831');


CREATE TABLE cinema (
    cinema_id INT(6) AUTO_INCREMENT,
    manager_id INT(6),
    address_id INT(6),
    phone VARCHAR(256),
    PRIMARY KEY (cinema_id),
    FOREIGN KEY (address_id) References address (address_id)
);

INSERT INTO cinema VALUES ( 2000, 100, 1000, '123.456.7890');
INSERT INTO cinema VALUES ( 2001, 101, 1001, '111.222.3333');
INSERT INTO cinema VALUES ( 2002, 102, 1002, '999.888.7777');
INSERT INTO cinema VALUES ( 2003, 103, 1003, '987.654.3210');
INSERT INTO cinema VALUES ( 2004, 104, 1004, '888.888.8888');


CREATE TABLE employee (
    employee_id INT(6) AUTO_INCREMENT,
    first_name VARCHAR(256) NOT NULL,
    last_name VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    birthdate DATE NOT NULL,
    salary INT CHECK (salary > 0),
    hire_date DATE NOT NULL,
    ssn INT(9) NOT NULL,
    address_id INT (6),
    store_number INT(6),
    manager_id INT(6),
    PRIMARY KEY (employee_id),
    FOREIGN KEY (address_id) References address (address_id),
    FOREIGN KEY (store_number) References cinema (cinema_id)
);

INSERT INTO employee VALUES ( 100, 'Steven', 'King', 'SKING@gmail.com', '515.123.4567', STR_TO_DATE('07-10-1962', '%d-%m-%Y'), 24000, STR_TO_DATE('17-06-2003', '%d-%m-%Y'), '123758359', 1000, 2000, NULL);
INSERT INTO employee VALUES ( 101, 'Neena', 'Kochhar', 'NKOCHHAR@gmail.com', '515.123.4568', STR_TO_DATE('17-03-1978', '%d-%m-%Y'), 17000, STR_TO_DATE('21-09-2005', '%d-%m-%Y'), '578356985', 1001, 2000, 100);
INSERT INTO employee VALUES ( 102, 'Lex', 'De Haan', 'LDEHAAN@hotmail.com', '515.123.4569', STR_TO_DATE('08-05-1969', '%d-%m-%Y'), 17000, STR_TO_DATE('13-01-2001', '%d-%m-%Y'), '624539668', 1002, 2001, 100);
INSERT INTO employee VALUES ( 103, 'Alexander', 'Hunold', 'AHUNOLD@protonmail.com', '590.423.4567', STR_TO_DATE('22-08-1980', '%d-%m-%Y'), 9000, STR_TO_DATE('03-01-2006', '%d-%m-%Y'), '558326446', 1003, 2002, 102);
INSERT INTO employee VALUES ( 104, 'Bruce', 'Ernst', 'BERNST@gmail.com', '590.423.4568', STR_TO_DATE('12-04-1987', '%d-%m-%Y'), 6000, STR_TO_DATE('21-05-2007', '%d-%m-%Y'), '355795362', 1004, 2000, 103);

ALTER TABLE cinema ADD (CONSTRAINT cine_mgr_fk FOREIGN KEY (manager_id) REFERENCES employee (employee_id));

CREATE TABLE customer (
    customer_id INT(6) AUTO_INCREMENT,
    first_name VARCHAR(256) NOT NULL,
    last_name VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
    Phone VARCHAR(20) NOT NULL,
    Birthdate DATE NOT NULL,
    membership_number INT(6),
    join_date DATE,
    points INT(7) DEFAULT 0 NOT NULL,
    favorite_cinema INT(6),
    PRIMARY KEY (customer_id),
    FOREIGN KEY (favorite_cinema) References cinema (cinema_id)
);

INSERT INTO customer VALUES ( 500, 'David', 'Austin', 'DAUSTIN@gmail.com', '590.423.4569', STR_TO_DATE('15-03-1992', '%d-%m-%Y'), 3000, STR_TO_DATE('25-06-2005', '%d-%m-%Y'), 4800, 2000);
INSERT INTO customer VALUES ( 501, 'Valli', 'Pataballa', 'VPATABAL@hotmail.com', '590.423.4560', STR_TO_DATE('05-04-1975', '%d-%m-%Y'), 3001, STR_TO_DATE('05-02-2006', '%d-%m-%Y'), 0, 2001);
INSERT INTO customer VALUES ( 502, 'Diana', 'Lorentz', 'DLORENTZ@hotmail.com', '590.423.5567', STR_TO_DATE('23-02-1982', '%d-%m-%Y'), 3002, STR_TO_DATE('07-02-2007', '%d-%m-%Y'), 3200, NULL);
INSERT INTO customer VALUES ( 503, 'Nancy', 'Greenberg', 'NGREENBE@yahoo.com', '515.124.4569', STR_TO_DATE('12-11-1959', '%d-%m-%Y'), 3003, STR_TO_DATE('17-08-2002', '%d-%m-%Y'), 0, NULL);
INSERT INTO customer VALUES ( 504, 'Daniel', 'Faviet', 'DFAVIET@gmail.com', '515.124.4169', STR_TO_DATE('17-09-1998', '%d-%m-%Y'), 3004, STR_TO_DATE('16-08-2002', '%d-%m-%Y'), 1090, 2003);

CREATE TABLE theater (
    cinema_id INT(10),
    theater_number INT(2),
    capacity INT(3),
    PRIMARY KEY (cinema_id, theater_number),
    FOREIGN KEY (cinema_id) References cinema (cinema_id)
);

INSERT INTO theater VALUES ( 2000, 01, 100 );
INSERT INTO theater VALUES ( 2000, 02, 150 );
INSERT INTO theater VALUES ( 2000, 03, 170 );
INSERT INTO theater VALUES ( 2000, 04, 190 );
INSERT INTO theater VALUES ( 2001, 01, 80 );
INSERT INTO theater VALUES ( 2001, 02, 170 );
INSERT INTO theater VALUES ( 2003, 01, 120 );
INSERT INTO theater VALUES ( 2003, 02, 80 );
INSERT INTO theater VALUES ( 2003, 03, 72 );
INSERT INTO theater VALUES ( 2004, 01, 100 );

CREATE TABLE movie (
    movie_id INT(6) AUTO_INCREMENT,
    movie_name VARCHAR(256) NOT NULL,
    duration INT(5),
    rating_mpaa CHAR(4),
    rating_imdb DECIMAL(4, 2),
    director VARCHAR(30) NOT NULL,
    genre VARCHAR(20),
    PRIMARY KEY (movie_id)
);

INSERT INTO movie VALUES ( 4000, 'Leon: The Professional', 110, 'R', 8.5, 'Luc Besson', 'Action');
INSERT INTO movie VALUES ( 4001, 'The Thing', 109, 'R', 8.1, 'John Carpenter', 'Horror');
INSERT INTO movie VALUES ( 4002, 'Parasite', 132, 'R', 8.6, 'Bong Joon Ho', 'Thriller');
INSERT INTO movie VALUES ( 4003, 'A Goofy Movie', 118, 'G', 6.8, 'Kevin Lima', 'Comedy');
INSERT INTO movie VALUES ( 4004, 'Valley Uprising', 103, 'NR', 8.1, 'Peter Mortimer', 'Documentary');

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

INSERT INTO shows VALUES ( 6000, 2000, 4000, '21:30', STR_TO_DATE('18-03-2020', '%d-%m-%Y'), 100);
INSERT INTO shows VALUES ( 6001, 2000, 4000, '23:30', STR_TO_DATE('12-03-2020', '%d-%m-%Y'), 120);
INSERT INTO shows VALUES ( 6002, 2003, 4003, '20:00', STR_TO_DATE('29-03-2020', '%d-%m-%Y'), 130);
INSERT INTO shows VALUES ( 6003, 2000, 4002, '19:00', STR_TO_DATE('03-04-2020', '%d-%m-%Y'), 110);
INSERT INTO shows VALUES ( 6004, 2004, 4004, '17:20', STR_TO_DATE('08-05-2020', '%d-%m-%Y'), 80);

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

INSERT INTO ticket VALUES ( 7000, 6001, '23:30', 15.00, 'REG', 30);
INSERT INTO ticket VALUES ( 7001, 6002, '20:00', 10.00, 'SEN', 30);
INSERT INTO ticket VALUES ( 7002, 6001, '23:30', 8.00, 'CHLD', 15);
INSERT INTO ticket VALUES ( 7003, 6003, '19:00', 15.00, 'REG', 30);
INSERT INTO ticket VALUES ( 7004, 6004, '17:20', 10.00, 'REG', 20);


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

INSERT INTO transaction VALUES ( 8000, 7000, 2000, 500, 'CREDIT', STR_TO_DATE('12-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8001, 7002, 2003, 501, 'CASH', STR_TO_DATE('12-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8002, 7003, 2002, 502, 'GIFT', STR_TO_DATE('03-04-2020', '%d-%m-%Y')); 
INSERT INTO transaction VALUES ( 8003, 7004, 2002, 504, 'CREDIT', STR_TO_DATE('08-05-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8004, 7001, 2000, 503, 'CASH', STR_TO_DATE('29-03-2020', '%d-%m-%Y'));


Create Table manager (
    cinema_id INT(6),
    manager_id INT(6),
    email VARCHAR(256), 
    password VARCHAR(256),
    PRIMARY KEY (cinema_id),
    FOREIGN KEY (cinema_id) References cinema (cinema_id),
    FOREIGN KEY (manager_id) References cinema (manager_id),
    FOREIGN KEY (email) References employee (email)
);

INSERT INTO manager VALUES (2000, 100, 'sking@gmail.com', 'admin');
INSERT INTO manager VALUES (2001, 101, 'nkochhar@gmail.com', 'password1');
INSERT INTO manager VALUES (2002, 102, 'ldehaan@hotmail.com', 'password2');


-- Are these even necessary???
CREATE TABLE supervisor (
    supervisor_id INT(10),
    Worker (int(10)),
PRIMARY KEY (Boss),
PRIMARY KEY (Worker),
FORIEGN KEY (Boss) References (Employee(ID)),
FORIEGN KEY (Worker) References (Employee(ID))
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

CREATE TABLE person (
    person_id INT(6) AUTO_INCREMENT,
    first_name VARCHAR(256) NOT NULL,
    last_name VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
    Phone VARCHAR(20) NOT NULL,
    Birthdate DATE NOT NULL,
    PRIMARY KEY (person_id)
);
