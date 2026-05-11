<?php
require_once 'config.php';

$id = $_GET['id'] ?? 0;

// Fetch game details
$stmt = $pdo->prepare("
    SELECT j.*, p.nombre AS plataforma 
    FROM juegos j 
    JOIN plataformas p ON j.id_plataforma = p.id 
    WHERE j.id = :id
");
$stmt->execute(['id' => $id]);
$juego = $stmt->fetch();

if (!$juego) {
    header("Location: ranking.php");
    exit;
}

$imgUrl = !empty($juego['imagen_url']) 
    ? htmlspecialchars($juego['imagen_url']) 
    : 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=1200&q=80';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameRank - <?php echo htmlspecialchars($juego['titulo']); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background-animation"></div>

    <header style="padding: 2rem 0;">
        <div class="container">
            <h1 style="font-size: 2.5rem;"><a href="inicio.php" style="color: inherit; text-decoration: none;">Game<span>Rank</span></a></h1>
        </div>
    </header>

    <main class="container">
        <div class="detail-container">
            <img class="detail-header-img" src="<?php echo $imgUrl; ?>" alt="<?php echo htmlspecialchars($juego['titulo']); ?> Header" onerror="this.src='https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=1200&q=80'">
            
            <div class="detail-body">
                <div class="detail-info">
                    <h1><?php echo htmlspecialchars($juego['titulo']); ?></h1>
                    <span class="detail-platform"><?php echo htmlspecialchars($juego['plataforma']); ?></span>
                    
                    <div class="detail-actions">
                        <a href="ranking.php" class="btn btn-secondary">Volver al Ranking</a>
                    </div>
                </div>

                <div class="detail-score">
                    <span class="sv"><?php echo number_format($juego['puntuacion'], 1); ?></span>
                    <span class="sl">PUNTUACIÓN</span>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> GameRank. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
