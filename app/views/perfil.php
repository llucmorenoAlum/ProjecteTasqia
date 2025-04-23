<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <?php if (is_null($_SESSION['imatge'] )) :?>
        <img src="https://ui-avatars.com/api?rounded=true&name=<?php echo $_SESSION['nom']?>" alt="Perfil" id="avatar">
    <?php else :?>
        <img src="<?php echo $_SESSION['imatge']?>" alt="">
    <?php endif ?>
    <form action="" method="post">
    <input type="url" name="imatge_url" id="imatge_url" required>
    <button type="submit">Canviar Imatge</button>
    </form>
    <h2>Nom: <?php echo $_SESSION['nom']?></h2>
    <h2>Correu: <?php echo $_SESSION['usuari']?></h2>
</body>
</html>