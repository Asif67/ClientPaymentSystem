CREATE table client_info(
    id int not null AUTO_INCREMENT PRIMARY key,
    client_name varchar(255),
    client_address varchar(255),
    client_mobile_number varchar(255)
);
CREATE TABLE client_due(
	id int(11) PRIMARY KEY AUTO_INCREMENT NOT null,
    due_amount DECIMAL(18,2),
    due_date date NOT null,
    client_id int
);
ALTER TABLE client_due
ADD FOREIGN KEY (client_id) REFERENCES client_info(id);
CREATE TABLE client_payment(
	id int(11) PRIMARY KEY AUTO_INCREMENT NOT null,
    payment_date date NOT null,
    payment_amount DECIMAL(18,2),
    client_id int
);
ALTER TABLE client_payment
ADD FOREIGN KEY (client_id) REFERENCES client_info(id);
CREATE TABLE client_payment_check(
	id int(11) PRIMARY KEY AUTO_INCREMENT NOT null,
    payment_date date NOT null,
    payment_amount DECIMAL(18,2),
    is_due tinyint,
    client_id int
);
ALTER TABLE client_payment_check
ADD FOREIGN KEY (client_id) REFERENCES client_info(id);