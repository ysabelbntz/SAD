DROP DATABASE IF EXISTS mega;
CREATE DATABASE mega;

USE mega;

CREATE TABLE accounts(
	account_id MEDIUMINT NOT NULL AUTO_INCREMENT,
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	username VARCHAR(50) NOT NULL,
	password VARCHAR(100) NOT NULL,
	account_type VARCHAR(6) NOT NULL,
	email VARCHAR(50),
	contact_number VARCHAR(30),
	address VARCHAR(255),
	notes TEXT,
	CONSTRAINT accounts_pk PRIMARY KEY (account_id)
 );

CREATE TABLE clients(
	client_id MEDIUMINT NOT NULL AUTO_INCREMENT,
	account_id MEDIUMINT NOT NULL,
	classification VARCHAR(10) NOT NULL,
	representative_first_name VARCHAR(50) NOT NULL,
	representative_last_name VARCHAR(50) NOT NULL,
	comaker_first_name VARCHAR(50) NOT NULL,
	comaker_last_name VARCHAR(50) NOT NULL, 
	company_name VARCHAR(60) NOT NULL,
	address VARCHAR(255) NOT NULL,
	status VARCHAR(8) NOT NULL,
	email VARCHAR(50),
	contact_number VARCHAR(30),
	notes TEXT,
	CONSTRAINT clients_pk PRIMARY KEY (client_id),
	CONSTRAINT clients_fk FOREIGN KEY (account_id) REFERENCES accounts(account_id)
);

CREATE TABLE cases(
	case_id MEDIUMINT NOT NULL AUTO_INCREMENT,
	client_id MEDIUMINT NOT NULL,
	loan_amount DECIMAL(9,2) NOT NULL,
	actual_total_balance DECIMAL(9,2) NOT NULL, /*ADD BOTH ACTUAL*/
	date_of_release DATE NOT NULL,
	date_of_maturity DATE NOT NULL,
	payment_period SMALLINT(3) NOT NULL, /*NUMBER OF WEEKS*/
	weekly_interest_rate SMALLINT(3) NOT NULL,
	notes TEXT,
	status VARCHAR(8) NOT NULL,
	actual_principal_balance DECIMAL(9,2) NOT NULL, /*LOAN AMOUNT*/
	actual_interest_balance DECIMAL(9,2)  NOT NULL, /*THIS = INTEREST RATE*LOAN AMOUNT*NOWEEKS*/
	CONSTRAINT cases_pk PRIMARY KEY (case_id),
	CONSTRAINT cases_fk1 FOREIGN KEY (client_id) REFERENCES clients(client_id)
);


/*check acual *2 or *3 then if pasok sa 2 weeks, add to the next id*/

CREATE TABLE expected(
	expected_id MEDIUMINT NOT NULL AUTO_INCREMENT,
	client_id MEDIUMINT NOT NULL,
	case_id MEDIUMINT NOT NULL,
	expected_due_date DATE NOT NULL,
	expected_principal_balance DECIMAL(9,2)  NOT NULL,
	expected_interest_balance DECIMAL(9,2)  NOT NULL,
	expected_total_balance DECIMAL(9,2)  NOT NULL,
	principal_due DECIMAL(9,2)  NOT NULL,
	interest_due DECIMAL(9,2)  NOT NULL,
	total_due DECIMAL(9,2)  NOT NULL,
	status VARCHAR(8) NOT NULL, /*PAID,UNPAID, SKIPPED OVER???*/
	CONSTRAINT expected_pk PRIMARY KEY (expected_id),
	CONSTRAINT expected_fk1 FOREIGN KEY (case_id) REFERENCES cases(case_id),
	CONSTRAINT expected_fk2 FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

CREATE TABLE payment(
	payment_id MEDIUMINT NOT NULL AUTO_INCREMENT,
	client_id MEDIUMINT NOT NULL,
	case_id MEDIUMINT NOT NULL,
	account_id MEDIUMINT NOT NULL,
	expected_id MEDIUMINT NOT NULL,
	turn_date DATE NOT NULL,
	type_of_payment VARCHAR(11) NOT NULL,
	check_number VARCHAR(15) NULL,
	turn_amount DECIMAL(9,2) NOT NULL,
	principal_paid DECIMAL(9,2) NOT NULL,
	interest_paid DECIMAL(9,2) NOT NULL,
	penalty FLOAT(4) NOT NULL, /*NUMBER OF DAYS LATE*25* SUBTRACT CURRENT DATE TO LAST DUE DATE*/
	status VARCHAR(8) NOT NULL,
	notes TEXT,
	CONSTRAINT payment_pk PRIMARY KEY (payment_id),
	CONSTRAINT payment_fk1 FOREIGN KEY (client_id) REFERENCES clients(client_id),
	CONSTRAINT payment_fk2 FOREIGN KEY (account_id) REFERENCES accounts(account_id),
	CONSTRAINT payment_fk3 FOREIGN KEY (case_id) REFERENCES cases(case_id),
	CONSTRAINT payment_fk4 FOREIGN KEY (expected_id) REFERENCES expected(expected_id)
);



CREATE TABLE logs
(
	log_id MEDIUMINT NOT NULL AUTO_INCREMENT,
	username VARCHAR(61) NOT NULL,
	time_stamp TIMESTAMP NOT NULL,
	action VARCHAR(50) NOT NULL,
	client VARCHAR(60) NOT NULL,
	old_value VARCHAR(255),
	new_value VARCHAR(255) NOT NULL,
	CONSTRAINT logs_pk PRIMARY KEY (log_id)
);

INSERT INTO accounts VALUES
/*password: hehehe; password:whyucry*/
/*encrypt password pls*/
(1,'Anna', 'Melgar', "admelgar","$2a$10$J7ELAufFTDwm9REekaJSLObhlLnf7MCYvYBnt39ackgkuL.jUUkbi",'admin','anna.melgar@yahoo.com','09151230244','12111 Katipunan Avenue, Manila 1008','Go Anna!'),
(2,'Mandy','Moore',"mmoore","$2a$04$VUO5cBCOCWCy2o6bc6yCseAz7n9FIo.hnVpqOV5IuiMlk6uDr4n8W",'officer','cry@gmail.com','09121144211','12311 J Santos street, QC 1211','Go Mandy!');





