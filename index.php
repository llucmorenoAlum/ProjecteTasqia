<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <?php 
        require_once 'funcions.php';
        require_once 'connexioBD.php';    
    ?>
</head>
<body>
    <section>
        <form class="formulari" action="procesarLogin.php" method="post">
            <h1 id="titolIndex">Inicia sessió</h1>
            <label for="usuari">Usuari:</label><br>
            <input type="text" id="usuari" name="usuari" placeholder="Introdueix el teu nom d'usuari" required><br>
            <label for="contrasenya">Contrasenya:</label><br>
            <input type="password" id="contrasenya" name="contrasenya" placeholder="Introdueix la contrasenya" required><br>    
            <button type="submit">Iniciar sessió</button><button>Registrar-se</button>
        </form>
    </section>
</body>
</html>