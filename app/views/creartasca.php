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
            <label for="nomTasca">Tasca</label>
            <input name="nomTasca" placeholder="Introdueix el nom de la tasca..." type="text" required>
            <label for="dataInici">Data</label>
            <input type="datetime-local" name="dataInici" required>
            <label for="descripcioTasca">Descripció</label>
            <textarea name="descripcioTasca" rows="3"></textarea>
            <button name="accio" aria-placeholder="Introdueix la descripció de la tasca..." value="novaTasca">Crear</button>
        </form>
    </section>
</body>
</html>