-- SQL Script for GameRank Application
-- Database: gestion_juegos

CREATE DATABASE IF NOT EXISTS gestion_juegos;
USE gestion_juegos;

-- 1. Table: plataformas
CREATE TABLE IF NOT EXISTS plataformas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Table: juegos
CREATE TABLE IF NOT EXISTS juegos (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    titulo        VARCHAR(100)  NOT NULL,
    puntuacion    DECIMAL(3, 1) NOT NULL,
    id_plataforma INT,
    imagen_url    VARCHAR(255)  DEFAULT NULL,
    FOREIGN KEY (id_plataforma) REFERENCES plataformas(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Seed Data: plataformas
INSERT INTO plataformas (nombre) VALUES 
('PC Master Race'),
('PlayStation 5'),
('Xbox Series X'),
('Nintendo Switch'),
('Mobile / iOS / Android');

-- 4. Seed Data: juegos (con URLs estables y directas)
INSERT INTO juegos (titulo, puntuacion, id_plataforma, imagen_url) VALUES 
(
    'The Witcher 3: Wild Hunt',
    9.7,
    1,
    'https://image.api.playstation.com/vulcan/ap/rnd/202211/0711/kh4MUIuMmHlktOHar3lVl6rY.png'
),
(
    'God of War Ragnarök',
    9.5,
    2,
    'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/2322010/extras/INT9_PC_KeyArt-MotionGraphic.gif?t=1717117701'
),
(
    'Forza Horizon 5',
    8.9,
    3,
    'https://image.api.playstation.com/vulcan/ap/rnd/202502/1900/631436cfbc1d64659c778e3783f29fafad6022145e0ffec8.jpg'
),
(
    'The Legend of Zelda: Breath of the Wild',
    9.9,
    4,
    'https://www.nintendo.com/eu/media/images/10_share_images/games_15/wiiu_14/SI_WiiU_TheLegendOfZeldaBreathOfTheWild_image1600w.jpg'
),
(
    'Genshin Impact',
    8.5,
    5,
    'https://image.api.playstation.com/vulcan/ap/rnd/202508/2602/30935168a0f21b6710dc2bd7bb37c23ed937fb9fa747d84c.png'
);
