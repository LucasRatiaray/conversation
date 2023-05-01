////////////////////////////////////////
CREATE TABLE user (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    pseudo VARCHAR(255) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
////////////////////////////////////////