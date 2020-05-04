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
    num_tickets INT(6),
    total_cost DECIMAL(6, 2),
    cinema_id INT(6),
    customer_id INT(6),
    payment_form Char(10),
    transaction_date DATE,
    PRIMARY KEY (transaction_id),
    FOREIGN KEY (cinema_id) References cinema (cinema_id),
    FOREIGN KEY (customer_id) References customer (customer_id)
);

INSERT INTO transaction VALUES ( 8000, 3, 46.80, 2000, 500, 'CREDIT', STR_TO_DATE('12-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8001, 2, 22.37, 2003, 501, 'CASH', STR_TO_DATE('12-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8002, 8, 102.98, 2002, 502, 'GIFT', STR_TO_DATE('03-04-2020', '%d-%m-%Y')); 
INSERT INTO transaction VALUES ( 8003, 1, 15.23, 2002, 504, 'CREDIT', STR_TO_DATE('08-05-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8004, 5, 80.27, 2001, 503, 'CASH', STR_TO_DATE('29-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8006, 1, 10.27, 2000, 503, 'CASH', STR_TO_DATE('29-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8007, 2, 20.27, 2000, 503, 'GIFT', STR_TO_DATE('29-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8008, 3, 40.27, 2000, 503, 'CREDIT', STR_TO_DATE('29-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8009, 2, 27.27, 2000, 503, 'CASH', STR_TO_DATE('29-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8010, 3, 37.27, 2000, 503, 'CASH', STR_TO_DATE('29-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8011, 5, 88.27, 2000, 504, 'CREDIT', STR_TO_DATE('29-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8012, 6, 94.27, 2000, 504, 'CREDIT', STR_TO_DATE('29-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8013, 5, 83.27, 2000, 504, 'CASH', STR_TO_DATE('29-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8014, 6, 93.27, 2000, 504, 'CREDIT', STR_TO_DATE('29-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8015, 4, 70.27, 2000, 504, 'GIFT', STR_TO_DATE('29-03-2020', '%d-%m-%Y'));
INSERT INTO transaction VALUES ( 8016, 5, 80.27, 2000, 504, 'CASH', STR_TO_DATE('29-03-2020', '%d-%m-%Y'));


Create Table manager (
    cinema_id INT(6),
    manager_id INT(6),
    email VARCHAR(256), 
    password VARCHAR(256),
    PRIMARY KEY (cinema_id),
    FOREIGN KEY (cinema_id) References cinema (cinema_id),
    FOREIGN KEY (manager_id) References cinema (manager_id),
    FOREIGN KEY (email) References employee (email) ON UPDATE CASCADE
);

INSERT INTO manager VALUES (2000, 100, 'sking@gmail.com', '$2y$10$Oy5pCdJirvyFTgx.mU8npeLB/ew2L42wn895FY9mdNYIYxATu2Y1K');
INSERT INTO manager VALUES (2001, 101, 'nkochhar@gmail.com', '$2y$10$LE9c5Lxv798xqXqqXGFo1uX56LxcGsqZRIbgh4GWUWeTDoHuyqFw6');
INSERT INTO manager VALUES (2002, 102, 'ldehaan@hotmail.com', '$2y$10$.G1n5xlzRDupl9oWoUoMj.6WeUO.IXlNK0GlAMwlP/L84eeoOQgNC');

---------------------------------------------------------------------
-- Functions & Procedures
---------------------------------------------------------------------
--Manager Functions
DROP FUNCTION IF EXISTS managerNameById;
DELIMITER //
CREATE FUNCTION managerNameById(p_manager_id INT) RETURNS VARCHAR(255)
BEGIN
    DECLARE v_manager_name VARCHAR(255);
    SELECT CONCAT(first_name, ' ', last_name) INTO v_manager_name FROM employee WHERE employee_id = p_manager_id;
    RETURN v_manager_name;
END//
DELIMITER ;

DROP FUNCTION IF EXISTS managerEmailById;
DELIMITER //
CREATE FUNCTION managerEmailById(p_manager_id INT) RETURNS VARCHAR(255)
BEGIN
    DECLARE v_manager_email VARCHAR(255);
    SELECT email INTO v_manager_email FROM employee WHERE employee_id = p_manager_id;
    RETURN v_manager_email;
END//
DELIMITER ;

DROP FUNCTION IF EXISTS managerPhoneById;
DELIMITER //
CREATE FUNCTION managerPhoneById(p_manager_id INT) RETURNS VARCHAR(255)
BEGIN
    DECLARE v_manager_phone VARCHAR(255);
    SELECT phone INTO v_manager_phone FROM employee WHERE employee_id = p_manager_id;
    RETURN v_manager_phone;
END//
DELIMITER ;

DROP FUNCTION IF EXISTS addressIdByManagerId;
DELIMITER //
CREATE FUNCTION addressIdByManagerId(p_manager_id INT) RETURNS INT
BEGIN
    declare v_address_id INT(6);
    SELECT address_id INTO v_address_id FROM employee WHERE employee_id = p_manager_id; 
    RETURN v_address_id;
END//
DELIMITER ;

DROP FUNCTION IF EXISTS managerAddressById;
DELIMITER //
CREATE FUNCTION managerAddressById(p_manager_id INT) RETURNS VARCHAR(255)
BEGIN
    declare v_manager_address VARCHAR(255);
    SELECT CONCAT(street_address, ' ', city, ', ', state, ' ', zip) INTO v_manager_address FROM address WHERE address_id = addressIDByManagerId(p_manager_id);
    RETURN v_manager_address;
END//
DELIMITER ; 

-- Daily Functions
DROP FUNCTION IF EXISTS dailyTickets;
DELIMITER //
CREATE FUNCTION dailyTickets(p_cinema_id INT, p_date DATE) RETURNS INT
BEGIN
    DECLARE v_sum INT(6);
    SELECT SUM(num_tickets) INTO v_sum FROM transaction WHERE cinema_id = p_cinema_id AND transaction_date = p_date; 
    RETURN v_sum;
END//
DELIMITER ;

DROP FUNCTION IF EXISTS dailyGrossSales;
DELIMITER //
CREATE FUNCTION dailyGrossSales(p_cinema_id INT, p_date DATE) RETURNS DECIMAL(8, 2)
BEGIN
    DECLARE v_gross_sales DECIMAL(8, 2);
    SELECT SUM(total_cost) INTO v_gross_sales FROM transaction WHERE cinema_id = p_cinema_id AND transaction_date = p_date; 
    RETURN v_gross_sales;
END//
DELIMITER ;

DROP FUNCTION IF EXISTS dailySalesByType;
DELIMITER //
CREATE FUNCTION dailySalesByType(p_cinema_id INT, p_date DATE, p_type VARCHAR(255)) RETURNS DECIMAL(8, 2)
BEGIN
    DECLARE v_type_sales DECIMAL(8, 2);
    SELECT SUM(total_cost) INTO v_type_sales FROM transaction WHERE cinema_id = p_cinema_id AND transaction_date = p_date AND payment_form LIKE p_type; 
    RETURN v_type_sales;
END//
DELIMITER ;

DROP FUNCTION IF EXISTS dailyTransactions;
DELIMITER //
CREATE FUNCTION dailyTransactions(p_cinema_id INT, p_date DATE) RETURNS INT
BEGIN
    DECLARE v_num_transactions INT;
    SELECT COUNT(*) INTO v_num_transactions FROM transaction WHERE cinema_id = p_cinema_id AND transaction_date = p_date; 
    RETURN v_num_transactions;
END//
DELIMITER ;


-- Monthly Functions
DROP FUNCTION IF EXISTS monthlyTickets;
DELIMITER //
CREATE FUNCTION monthlyTickets(p_cinema_id INT, p_date DATE) RETURNS INT
BEGIN
    DECLARE v_sum INT(6);
    SELECT SUM(num_tickets) INTO v_sum FROM transaction WHERE cinema_id = p_cinema_id AND MONTH(transaction_date) = MONTH(p_date) AND YEAR(transaction_date) = YEAR(p_date); 
    RETURN v_sum;
END//
DELIMITER ;

DROP FUNCTION IF EXISTS monthlyGrossSales;
DELIMITER //
CREATE FUNCTION monthlyGrossSales(p_cinema_id INT, p_date DATE) RETURNS DECIMAL(8, 2)
BEGIN
    DECLARE v_gross_sales DECIMAL(8, 2);
    SELECT SUM(total_cost) INTO v_gross_sales FROM transaction WHERE cinema_id = p_cinema_id AND MONTH(transaction_date) = MONTH(p_date) AND YEAR(transaction_date) = YEAR(p_date); 
    RETURN v_gross_sales;
END//
DELIMITER ;

DROP FUNCTION IF EXISTS monthlySalesByType;
DELIMITER //
CREATE FUNCTION monthlySalesByType(p_cinema_id INT, p_date DATE, p_type VARCHAR(255)) RETURNS DECIMAL(8, 2)
BEGIN
    DECLARE v_type_sales DECIMAL(8, 2);
    SELECT SUM(total_cost) INTO v_type_sales FROM transaction WHERE cinema_id = p_cinema_id AND payment_form LIKE p_type AND MONTH(transaction_date) = MONTH(p_date) AND YEAR(transaction_date) = YEAR(p_date); 
    RETURN v_type_sales;
END//
DELIMITER ;

DROP FUNCTION IF EXISTS monthlyTransactions;
DELIMITER //
CREATE FUNCTION monthlyTransactions(p_cinema_id INT, p_date DATE) RETURNS INT
BEGIN
    DECLARE v_num_transactions INT;
    SELECT COUNT(*) INTO v_num_transactions FROM transaction WHERE cinema_id = p_cinema_id AND MONTH(transaction_date) = MONTH(p_date) AND YEAR(transaction_date) = YEAR(p_date); 
    RETURN v_num_transactions;
END//
DELIMITER ;
