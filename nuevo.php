<?php
require_once 'config.php';

$mensaje = '';

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $puntuacion = $_POST['puntuacion'] ?? '';
    $id_plataforma = $_POST['id_plataforma'] ?? '';
    $imagen_url = $_POST['imagen_url'] ?? '';

    // Validación básica
    if (empty($titulo) || empty($puntuacion) || empty($id_plataforma)) {
        $mensaje = '<div class="alert alert-error">Por favor, completa todos los campos obligatorios.</div>';
    } else {
        try {
            // Uso de consultas preparadas para inserción segura
            $stmt = $pdo->prepare("INSERT INTO juegos (titulo, puntuacion, id_plataforma, imagen_url) VALUES (:titulo, :puntuacion, :id_plataforma, :imagen_url)");
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':puntuacion', $puntuacion);
            $stmt->bindParam(':id_plataforma', $id_plataforma);
            $stmt->bindParam(':imagen_url', $imagen_url);

            if ($stmt->execute()) {
                $mensaje = '<div class="alert alert-success">Juego añadido correctamente. <a href="index.php">Ver ranking</a></div>';
            } else {
                $mensaje = '<div class="alert alert-error">Hubo un problema al añadir el juego.</div>';
            }
        } catch (\PDOException $e) {
            $mensaje = '<div class="alert alert-error">Error de base de datos: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}

// Obtener plataformas para el select
$stmtPlataformas = $pdo->query("SELECT id, nombre FROM plataformas ORDER BY nombre ASC");
$plataformas = $stmtPlataformas->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Juego - GameRank</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background-animation"></div>

    <header>
        <div class="container">
            <h1>Nuevo <span>Juego</span></h1>
            <p>Añade un nuevo título a la base de datos</p>
        </div>
    </header>

    <main class="container">
        <section class="form-section">
            <div class="form-card">
                <div class="section-header">
                    <h2>🎮 Detalles del Juego</h2>
                    <a href="index.php" class="btn btn-secondary">Volver</a>
                </div>

                <?php echo $mensaje; ?>

                <form action="nuevo.php" method="POST" class="game-form">
                    <div class="form-group">
                        <label for="titulo">Título del Juego *</label>
                        <input type="text" id="titulo" name="titulo" required placeholder="Ej: The Last of Us">
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="puntuacion">Puntuación (0-10) *</label>
                            <input type="number" id="puntuacion" name="puntuacion" required step="0.1" min="0" max="10" placeholder="Ej: 9.5">
                        </div>

                        <div class="form-group">
                            <label for="id_plataforma">Plataforma *</label>
                            <select id="id_plataforma" name="id_plataforma" required>
                                <option value="">-- Selecciona una plataforma --</option>
                                <?php foreach ($plataformas as $plat): ?>
                                    <option value="<?php echo htmlspecialchars($plat['id']); ?>">
                                        <?php echo htmlspecialchars($plat['nombre']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="imagen_url">URL de la Portada (Opcional)</label>
                        <input type="url" id="imagen_url" name="imagen_url" placeholder="https://ejemplo.com/portada.jpg">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Añadir al Ranking</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
