--create account table--
CREATE TABLE account(
account_name VARCHAR(64) NOT NULL,
account_email VARCHAR(64) PRIMARY KEY,
account_password VARCHAR(64) DEFAULT 'Group12',
is_admin char(1) NOT NULL CHECK (is_admin = 'T' OR is_admin = 'F'));
--create project table--
CREATE TABLE project(
project_name VARCHAR(256) NOT NULL,
creator VARCHAR(64) REFERENCES account(account_email),
raised Numeric DEFAULT 0,
target Numeric NOT NULL,
created date NOT NULL,
project_start date NOT NULL,
project_end date NOT NULL CHECK (project_end >= project_start) ,
completed boolean DEFAULT false,
description VARCHAR(256) DEFAULT 'Please donate to our project. Thank you!',
bankinfo VARCHAR(256) NOT NULL,
picture_url VARCHAR(256),
PRIMARY KEY (project_name, creator));
--create invest table--
CREATE TABLE invest(
account_email VARCHAR(64) REFERENCES account(account_email),
project_name VARCHAR(256),
creator VARCHAR(64),
amount Numeric CHECK (amount > 0),
FOREIGN KEY(project_name, creator) REFERENCES project(project_name, creator) ON UPDATE
CASCADE);
