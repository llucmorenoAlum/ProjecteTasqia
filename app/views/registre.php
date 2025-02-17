<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <?php 
        //require_once '';
    ?>
    <script src="public/js/registre.js"></script>
</head>
<body>
    <h1>Tasqia</h1>
    <section class="formulari">
        <?php 
            if ($error != ""):?>
                <p class="error"><?php echo $error?></p>
            <?php endif
        ?>
        <form action="index.php" method="post">
            <h1>Registre d'usuari</h1>
            <label for="usuari">Nom:</label>
            <input type="text" id="usuari" name="usuari" placeholder="Introdueix el teu nom..." required minlength="2" maxlength="30">
            <label for="email">Correu electrònic:</label>
            <input type="email" name="email" id="email" placeholder="Introdueix el correu electrònic..." required>
            <label for="contrasenya">Contrasenya:</label>
            <input type="password" id="contrasenya" name="contrasenya" placeholder="Introdueix la contrasenya..." required minlength="5" maxlength="30">
            <label for="contrasenyaRep">Confirmar contrasenya:</label>
            <input type="password" id="contrasenya2" name="contrasenya2" placeholder="Torna a introduir la contrasenya..." required maxlength="30">
            <button type="submit" name="accio" value="registrarse">Registrar-se</button>
        </form>
    </section>
</body>
</html>