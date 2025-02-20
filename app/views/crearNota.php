<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="public/css/styles.css">
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
            <label for="titol">Títol</label>
            <input name="titol" placeholder="Introdueix el títol de la nota..." type="text" required>
            <label for="contingutNota">Contingut</label>
            <textarea name="contingutNota" rows="10"></textarea>
            <button name="accio" value="novaNota">Crear</button>
        </form>
    </section>
</body>
</html>