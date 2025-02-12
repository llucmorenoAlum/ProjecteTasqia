<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <?php 
        require_once 'app/controllers/loginController.php';  
    ?>
</head>
<body>
    <h1>Tasqia</h1>
    <section>
        <form action="/index.php" method="post">
            <h1>Inicia sessió</h1>
            <label for="usuari">Nom:</label>
            <input type="text" id="usuari" name="usuari" placeholder="Introdueix el teu nom" required>
            <label for="email">Correu electrònic:</label>
            <input type="email" name="email" id="email" placeholder="Introduiex el correu electrònic" required>
            <label for="contrasenya">Contrasenya:</label>
            <input type="password" id="contrasenya" name="contrasenya" placeholder="Introdueix la contrasenya" required>
            <button type="submit" name="accio" value="login">Iniciar sessió</button>
        </form>
        <form action="/index.php" method="post">
            <button name="accio" value="registre">Registrar-se</button>
        </form>
    </section>
</body>
</html>