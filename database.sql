-- SQL Script for Video Game Ranking Application
-- Database: ranking_juegos

CREATE DATABASE IF NOT EXISTS ranking_juegos;
USE ranking_juegos;

-- 1. Table: plataformas
-- Stores the gaming platforms (PC, PS5, etc.)
CREATE TABLE IF NOT EXISTS plataformas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Table: juegos
-- Stores the games, their scores, platform, and a cover image URL
CREATE TABLE IF NOT EXISTS juegos (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    titulo        VARCHAR(100)  NOT NULL,
    puntuacion    DECIMAL(3, 1) NOT NULL,
    id_plataforma INT,
    imagen_url    VARCHAR(255)  DEFAULT NULL,
    FOREIGN KEY (id_plataforma) REFERENCES plataformas(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Seed Data: plataformas (5 records)
INSERT INTO plataformas (nombre) VALUES 
('PC Master Race'),
('PlayStation 5'),
('Xbox Series X'),
('Nintendo Switch'),
('Mobile / iOS / Android');

-- 4. Seed Data: juegos (5 records) — with image_url from RAWG.io (public CDN)
-- RAWG is one of the largest video game databases with a public image API
INSERT INTO juegos (titulo, puntuacion, id_plataforma, imagen_url) VALUES 
(
    'The Witcher 3: Wild Hunt',
    9.7,
    1,
    'https://media.rawg.io/media/games/618/618c2031a07bbff6b4f611f10b6bcdbc.jpg'
),
(
    'God of War Ragnarök',
    9.5,
    2,
    'https://media.rawg.io/media/games/121/1213be3f-7de5-4c22-9a96-9e06c7e91c32.jpg'
),
(
    'Forza Horizon 5',
    8.9,
    3,
    'https://media.rawg.io/media/games/b54/b54598d3bf8d936a8e7c7b8f82b0a21b.jpg'
),
(
    'The Legend of Zelda: Breath of the Wild',
    9.9,
    4,
    'https://media.rawg.io/media/games/cc3/cc3f5a1eb1a3bca05f9c0ef63bc0bf6a.jpg'
),
(
    'Genshin Impact',
    8.5,
    5,
    'https://media.rawg.io/media/games/18c/18c8e2aded0740c9a4a49e71f73b6ac4.jpg'
);
