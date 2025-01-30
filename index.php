<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <?php 
        require_once 'Scripts/funcions.php';
        require_once 'Scripts/connexioBD.php';    
    ?>
</head>
<body>
    <h1>Tasqia</h1>
    <section>
        <form action="procesarLogin.php" method="post">
            <h1>Inicia sessió</h1>
            <label for="usuari">Nom:</label>
            <input type="text" id="usuari" name="usuari" placeholder="Introdueix el teu nom" required>
            <label for="email">Correu electrònic:</label>
            <input type="email" name="email" id="email">
            <label for="contrasenya">Contrasenya:</label>
            <input type="password" id="contrasenya" name="contrasenya" placeholder="Introdueix la contrasenya" required>
            <button type="submit">Iniciar sessió</button>
            <button onclick="window.location.href='registre.php'">Registrar-se</button>
        </form>
    </section>
</body>
</html>