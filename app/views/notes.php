<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/btnCrear.css">
</head>
<body>
    <?php 
        require_once 'app/controllers/indexController.php';
        require_once 'app/views/header.php'
    ?>
    <main class="notes">
        <div>
            <h1>Les teves notes</h1>
        </div>
        <div>
            <?php if (!empty($notes)): ?>
                <?php foreach ($notes as $nota): ?>
                    <div class="nota">
                        <div class="titol">
                            <?= htmlspecialchars($nota['titol']) ?>
                            <button class="eliminar">
                                <img src="public/media/borrar.webp" alt="Borrar">
                            </button>
                        </div>
                        <div class="data"><?= date("d/m/Y H:i", strtotime($nota['data_creacio'])) ?></div>
                        <div class="contingut"><?= nl2br(htmlspecialchars($nota['contingut'] ?? "Sense contingut")) ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No tens cap nota.</p>
            <?php endif; ?>
        </div>
        
        <form action="index.php" method="post">
            <!-- <button name="accio" value="crearNota" class="btnCrear">+</button> -->
            <button name="accio" value="crearTasca" class="Btn">
                <div class="sign">+</div>        
                <div class="text">Nota</div>
            </button>
        </form>
    </main>
</body>
</html>