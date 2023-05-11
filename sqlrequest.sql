CREATE TABLE player
(
    id INT NOT NULL AUTO_INCREMENT,
    login TEXT NOT NULL,
    race INT NOT NULL DEFAULT 0,
    password TEXT NOT NULL,
    score INT NOT NULL DEFAULT 0,
    PRIMARY KEY(id),
    UNIQUE(login(200))
);