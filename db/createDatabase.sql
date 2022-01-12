-- Create User Table
CREATE TABLE USER (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    HONORIFIC INT NOT NULL,
    FIRST_NAME VARCHAR(30) NOT NULL,
    LAST_NAME VARCHAR(30) NOT NULL,
    EMAIL VARCHAR(50) NOT NULL UNIQUE,
    USERNAME VARCHAR(20) NOT NULL UNIQUE,
    PASSWORD VARCHAR(40) NOT NULL,
    ACTIVE INT NOT NULL DEFAULT 1,
    ROLE INT NOT NULL DEFAULT 0
);

-- Create News Post Table
CREATE TABLE NEWS_POST (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    TITLE VARCHAR(100) NOT NULL,
    CONTENT VARCHAR(2000) NOT NULL,
    PICTURE VARCHAR(150),
    CREATION_TIME TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    USER_ID INT NOT NULL,
    CONSTRAINT FK_NEWS_POST_USER_ID FOREIGN KEY (USER_ID) REFERENCES USER (ID)
);

-- Create Ticket Table
CREATE TABLE TICKET (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    TITLE VARCHAR(100) NOT NULL,
    CONTENT VARCHAR(2000) NOT NULL,
    PICTURE VARCHAR(150),
    STATUS INT NOT NULL DEFAULT 0,
    CREATION_TIME TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    USER_ID INT NOT NULL,
    CONSTRAINT FK_TICKET_USER_ID FOREIGN KEY (USER_ID) REFERENCES USER (ID)
);