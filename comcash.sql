DROP TABLE IF EXISTS payment;
DROP TABLE IF EXISTS card;
DROP TABLE IF EXISTS client;

CREATE TABLE client (
        id INT UNSIGNED AUTO_INCREMENT NOT NULL,
        email VARCHAR(255),
        name VARCHAR(255),
        password VARCHAR(12),
        PRIMARY KEY(id)
);

CREATE TABLE card (
        id INT UNSIGNED AUTO_INCREMENT NOT NULL,
        clientId INT UNSIGNED NOT NULL,
        cardNo VARCHAR(16),
        expire CHAR(6),
        security VARCHAR(4),
        zip CHAR(5),
        FOREIGN KEY(clientId) REFERENCES client(id),
        PRIMARY KEY(id)
);

CREATE TABLE payment (
        id INT UNSIGNED AUTO_INCREMENT NOT NULL,
        cardId INT UNSIGNED NOT NULL,
        amount DECIMAL(16, 3),
        confirmation CHAR(16),
        FOREIGN KEY(cardId) REFERENCES card(id),
        PRIMARY KEY(id)
);
