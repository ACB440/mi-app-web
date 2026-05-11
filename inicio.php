<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameRank - Inicio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        .landing-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
            padding: 2rem;
            position: relative;
            z-index: 10;
        }
        .landing-title {
            font-size: 6rem;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            line-height: 1;
            letter-spacing: -2px;
        }
        .landing-title span {
            background: linear-gradient(135deg, var(--accent-primary), #ffffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .landing-subtitle {
            font-size: 1.2rem;
            color: var(--text-muted);
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 300;
            max-width: 600px;
            margin-bottom: 3rem;
        }
        .landing-buttons {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        .btn-large {
            padding: 1.2rem 3rem;
            font-size: 1.1rem;
            letter-spacing: 2px;
            border-radius: 50px;
        }
        .btn-outline {
            background: transparent;
            border: 2px solid var(--accent-primary);
            color: var(--text-main);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-outline:hover {
            background: rgba(230, 57, 70, 0.1);
            color: var(--accent-primary);
            box-shadow: var(--shadow-glow);
        }
        @media (max-width: 768px) {
            .landing-title { font-size: 4rem; }
            .landing-buttons { flex-direction: column; width: 100%; max-width: 300px; }
            .landing-buttons .btn { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="background-animation"></div>
    
    <div class="landing-container container">
        <h1 class="landing-title">Game<span>Rank</span></h1>
        <p class="landing-subtitle">El top definitivo de la industria del gaming. Explora, puntúa y añade tus títulos favoritos.</p>
        
        <div class="landing-buttons">
            <a href="ranking.php" class="btn btn-primary btn-large">Ver Ranking Global</a>
        </div>
    </div>

    <footer style="position: absolute; bottom: 0; width: 100%; border: none;">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> GameRank. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
