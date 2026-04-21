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
    'https://cdn.cdprojektred.com/witcher/common/images/witcher3/standard-edition-unboxing-cover.jpg'
),
(
    'God of War Ragnarök',
    9.5,
    2,
    'https://image.api.playstation.com/vulcan/ap/rnd/202207/1210/67vMoXfV7ZMo9N2V8u7v0u9u.png'
),
(
    'Forza Horizon 5',
    8.9,
    3,
    'https://store-images.s-microsoft.com/image/apps.1475.13735165158654634.6d5c5f8e-d967-4a0d-9a96-98188151ed42.79379854-d835-46fd-a43c-6f81643c168f'
),
(
    'The Legend of Zelda: Breath of the Wild',
    9.9,
    4,
    'https://assets.nintendo.com/image/upload/ar_16:9,c_lpad,w_1240/f_auto/q_auto/ncom/software/switch/70010000000025/desc/477b7c18-840a-4841-a1e6-234b6b15822f'
),
(
    'Genshin Impact',
    8.5,
    5,
    'https://image.api.playstation.com/vulcan/ap/rnd/202104/1315/22mToXfV7ZMo9N2V8u7v0u9u.png'
);
