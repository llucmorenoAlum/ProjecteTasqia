<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <?php require_once 'app/views/sortir.php'?>
    <main>
        <?php if (is_null($_SESSION['imatge'] )) :?>
            <img src="https://ui-avatars.com/api?rounded=true&name=<?php echo $_SESSION['nom']?>" alt="Perfil" id="imgPerfil">
        <?php else :?>
            <img src="<?php echo $_SESSION['imatge']?>" alt="" id="imgPerfil">
        <?php endif ?>
        <form id="canviImatgeForm">
            <label for="imatge_url">Imatge</label>
            <?php if (isset($_SESSION['imatge'])):?>
                <input  type="url" name="imatge_url" id="imatge_url" placeholder="URL de la imatge" value="<?php echo $_SESSION['imatge']?>" required>
            <?php else :?>
                <input  type="url" name="imatge_url" id="imatge_url" placeholder="URL de la imatge" required>
            <?php endif; ?>
            <button type="submit">Canviar Imatge</button>
        </form>
        <script src="public/js/api.js"></script>
        <h2>Nom: <?php echo $_SESSION['nom']?></h2>
        <h2>Correu: <?php echo $_SESSION['usuari']?></h2>
    </main>
</body>
</html>