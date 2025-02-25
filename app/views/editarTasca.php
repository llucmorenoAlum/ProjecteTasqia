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
                <input name="nomTasca" value="<?php echo $tasca['nom'] ?>" placeholder="Introdueix el nom de la tasca..." type="text" required>
                <label for="dataInici">Data</label>
                <input type="datetime-local" value="<?php echo $tasca['data_inici'] ?>" name="dataInici" required>
                <label for="descripcioTasca">Descripció</label>
                <textarea placeholder="Introdueix la descripció de la tasca..." name="descripcioTasca" rows="3"><?php echo $tasca['descripcio'] ?></textarea>
                <button name="accio" value="updateTasca">Guardar</button>
            </form>
        </section>
    </body>
</html>