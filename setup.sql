-- Create Database
CREATE DATABASE IF NOT EXISTS ranking_juegos;
USE ranking_juegos;

-- Table: plataformas
CREATE TABLE IF NOT EXISTS plataformas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: juegos
CREATE TABLE IF NOT EXISTS juegos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    puntuacion DECIMAL(3, 1) NOT NULL,
    id_plataforma INT,
    FOREIGN KEY (id_plataforma) REFERENCES plataformas(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed data for plataformas
INSERT INTO plataformas (nombre) VALUES 
('PC'),
('PlayStation 5'),
('Xbox Series X'),
('Nintendo Switch'),
('Mobile');

-- Seed data for juegos
INSERT INTO juegos (titulo, puntuacion, id_plataforma) VALUES 
('Elden Ring', 9.6, 1),
('The Last of Us Part II', 9.3, 2),
('Halo Infinite', 8.7, 3),
('The Legend of Zelda: Tears of the Kingdom', 9.8, 4),
('Genshin Impact', 8.5, 5);
