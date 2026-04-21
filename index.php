<?php
require_once 'config.php';

// Fetch games with their platform names and cover images, ordered by score
$stmt = $pdo->query("
    SELECT j.id, j.titulo, j.puntuacion, j.imagen_url, p.nombre AS plataforma 
    FROM juegos j 
    JOIN plataformas p ON j.id_plataforma = p.id 
    ORDER BY j.puntuacion DESC
");
$juegos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameRank - Ranking de Videojuegos</title>
    <meta name="description" content="GameRank - Descubre los videojuegos mejor valorados en todas las plataformas.">
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background-animation"></div>

    <header>
        <div class="container">
            <h1>Game<span>Rank</span></h1>
            <p>El top definitivo de la industria del gaming</p>
        </div>
    </header>

    <main class="container">
        <section class="ranking-section">
            <div class="section-header">
                <h2>🏆 Ranking Global</h2>
                <div style="display: flex; gap: 1rem; align-items: center;">
                    <a href="nuevo.php" class="btn">Añadir Juego</a>
                    <div class="badge">🔴 En vivo</div>
                </div>
            </div>

            <div class="ranking-grid">
                <?php if (count($juegos) === 0): ?>
                    <p style="text-align: center; color: var(--text-muted); padding: 2rem;">No hay juegos registrados aún. ¡Añade el primero!</p>
                <?php endif; ?>

                <?php foreach ($juegos as $index => $juego): ?>
                    <?php
                        // Use imagen_url from DB; fall back to a picsum placeholder if empty
                        $imgUrl = !empty($juego['imagen_url'])
                            ? htmlspecialchars($juego['imagen_url'])
                            : 'https://picsum.photos/300/200?grayscale';

                        // Medal class for top 3
                        $rankClass = '';
                        if ($index === 0) $rankClass = 'top-1';
                        elseif ($index === 1) $rankClass = 'top-2';
                        elseif ($index === 2) $rankClass = 'top-3';
                    ?>
                    <div class="game-card" id="game-<?php echo $index; ?>">
                        <img
                            class="game-thumbnail"
                            src="<?php echo $imgUrl; ?>"
                            alt="Portada de <?php echo htmlspecialchars($juego['titulo']); ?>"
                            loading="lazy"
                            width="300"
                            height="200"
                            onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=500&q=80';"
                        >
                        <div class="rank-number <?php echo $rankClass; ?>">#<?php echo $index + 1; ?></div>
                        <div class="game-info">
                            <h3 class="game-title"><?php echo htmlspecialchars($juego['titulo']); ?></h3>
                            <span class="platform-tag"><?php echo htmlspecialchars($juego['plataforma']); ?></span>
                        </div>
                        <div class="score-container">
                            <div class="score-value"><?php echo number_format($juego['puntuacion'], 1); ?></div>
                            <div class="score-label">Puntuación</div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <span>GameRank</span>. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
