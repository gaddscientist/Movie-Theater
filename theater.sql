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
INSERT INTO address VALUES ( 1002, '820 NW. Country Lane', 'Cheshire', 'CT', '06410');
INSERT INTO address VALUES ( 1003, '9599 Somerset Street', 'Sicklerville', 'NJ', '08081');
INSERT INTO address VALUES ( 1004, '7364 Mechanic Drive Lake', 'Jackson', 'TX', '77566');
INSERT INTO address VALUES ( 1005, '30 Poor House St.', 'Alabaster', 'AL', '35007');
INSERT INTO address VALUES ( 1006, '8286 Saxon Road', 'Omaha', 'NE', '68107'); 
INSERT INTO address VALUES ( 1007, '7232 Railroad Street', 'Huntington', 'NY', '11746');
INSERT INTO address VALUES ( 1008, '95 Fairground Rd.', 'Troy', 'NY', '12180');
INSERT INTO address VALUES ( 1009, '330 Magnolia Dr.', 'Monroe Township', 'NJ', '08831');
INSERT INTO address VALUES ( 1010, '9 Columbia Drive', 'Anaheim', 'CA', '92806');
INSERT INTO address VALUES ( 1011, '49 School Lane', 'Tonawanda', 'NY', '14150');
INSERT INTO address VALUES ( 1012, '59 Cardinal Street', 'Sacramento', 'CA', '95820');
INSERT INTO address VALUES ( 1013, '795 New Saddle Dr.', 'Rowlett', 'TX', '');
INSERT INTO address VALUES ( 1014, '572 Summer Court', 'Meadville', 'PA', '16335');
INSERT INTO address VALUES ( 1015, '392 Harbour Dr.', 'Waukesha', 'WI', '53186');
INSERT INTO address VALUES ( 1016, '2 Sunnyslope Lane', 'Fargo', 'ND', '58078');
INSERT INTO address VALUES ( 1017, '650 St Margarets Avenue', 'Chelsea', 'MA', '02150');
INSERT INTO address VALUES ( 1018, '885 Rock Maple Ave.', 'Wallingford', 'CT', '06492');
INSERT INTO address VALUES ( 1019, '8 Wood Ave.', 'Chippewa', 'WI', '54729');
INSERT INTO address VALUES ( 1020, '9911 Primrose Court', 'Plattsburgh', 'NY', '12901');
INSERT INTO address VALUES ( 1021, '696 Theatre Street ', 'Richardson', 'TX', '75080');
INSERT INTO address VALUES ( 1022, '506 Bear Hill St.', 'Joliet', 'IL', '60435');
INSERT INTO address VALUES ( 1023, '489 Pawnee St.', 'Fargo', 'ND', '58078');
INSERT INTO address VALUES ( 1024, '47 Hill Ave.', 'Daphne', 'AL', '36526');


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

CREATE TABLE movie (
    movie_id INT(6) AUTO_INCREMENT,
    movie_name VARCHAR(256) NOT NULL,
    duration INT(5),
    rating_mpaa CHAR(4),
    rating_imdb DECIMAL(4, 2),
    director VARCHAR(30) NOT NULL,
    genre VARCHAR(20),
    start_date DATE,
    end_date DATE,
    PRIMARY KEY (movie_id)
);

INSERT INTO movie VALUES ( 4000, 'Leon: The Professional', 110, 'R', 8.5, 'Luc Besson', 'Action', STR_TO_DATE('12-04-2020', '%d-%m-%Y'), STR_TO_DATE('17-05-2020', '%d-%m-%Y'));
INSERT INTO movie VALUES ( 4001, 'The Thing', 109, 'R', 8.1, 'John Carpenter', 'Horror', STR_TO_DATE('29-04-2020', '%d-%m-%Y'), STR_TO_DATE('27-05-2020', '%d-%m-%Y'));
INSERT INTO movie VALUES ( 4002, 'Parasite', 132, 'R', 8.6, 'Bong Joon Ho', 'Thriller', STR_TO_DATE('31-03-2020', '%d-%m-%Y'), STR_TO_DATE('09-05-2020', '%d-%m-%Y'));
INSERT INTO movie VALUES ( 4003, 'A Goofy Movie', 118, 'G', 6.8, 'Kevin Lima', 'Comedy', STR_TO_DATE('03-05-2020', '%d-%m-%Y'), STR_TO_DATE('07-06-2020', '%d-%m-%Y'));
INSERT INTO movie VALUES ( 4004, 'Valley Uprising', 103, 'NR', 8.1, 'Peter Mortimer', 'Documentary', STR_TO_DATE('20-04-2020', '%d-%m-%Y'), STR_TO_DATE('17-05-2020', '%d-%m-%Y'));
INSERT INTO movie VALUES ( 4005, 'The Devils Double', 108, 'R', 8.7, 'Lee Tamahori', 'Drama', STR_TO_DATE('17-05-2020', '%d-%m-%Y'), STR_TO_DATE('17-07-2020', '%d-%m-%Y'));
INSERT INTO movie VALUES ( 4006, 'Hellraiser', 93, 'R', 6.1, 'Clive Barker', 'Horror', STR_TO_DATE('27-05-2020', '%d-%m-%Y'), STR_TO_DATE('27-06-2020', '%d-%m-%Y'));
INSERT INTO movie VALUES ( 4007, 'The Incredibles', 115, 'G', 9.3, 'Brad Bird', 'Animation', STR_TO_DATE('09-05-2020', '%d-%m-%Y'), STR_TO_DATE('09-07-2020', '%d-%m-%Y'));
INSERT INTO movie VALUES ( 4008, 'A Goofy Movie', 118, 'G', 6.8, 'Kevin Lima', 'Animation', STR_TO_DATE('07-06-2020', '%d-%m-%Y'), STR_TO_DATE('07-07-2020', '%d-%m-%Y'));
INSERT INTO movie VALUES ( 4009, 'The Orphanage', 101, 'R', 9.5, 'Guilliermo Del Toro', 'Thriller', STR_TO_DATE('17-05-2020', '%d-%m-%Y'), STR_TO_DATE('17-06-2020', '%d-%m-%Y'));

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
