CREATE DATABASE IF NOT EXISTS game_inventory;
USE game_inventory;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','staff') NOT NULL DEFAULT 'staff'
);

CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    platform VARCHAR(50) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    description TEXT
);

INSERT INTO items (title, platform, genre, price, quantity, description) VALUES
('The Legend of Zelda: Breath of the Wild', 'Nintendo Switch', 'Adventure', 49.99, 10, 'Epic open-world Zelda adventure.'),
('God of War', 'PS5', 'Action', 59.99, 7, 'Mythical action adventure of Kratos and Atreus.'),
('Halo Infinite', 'Xbox Series X', 'Shooter', 39.99, 15, 'Latest in the legendary Halo shooter franchise.'),
('Stardew Valley', 'PC', 'Simulation', 14.99, 25, 'A relaxing farming and life simulation game.'),
('Super Mario Odyssey', 'Nintendo Switch', 'Platformer', 44.99, 8, 'Mario embarks on a globe-trotting adventure.'),
('Elden Ring', 'PC', 'RPG', 59.99, 12, 'Open world action RPG from the makers of Dark Souls.'),
('Spider-Man: Miles Morales', 'PS5', 'Action', 49.99, 6, 'Swing through snowy New York as Miles Morales.')
;