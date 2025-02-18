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
        <form action="index.php" method="post">
            <input type="hidden" name="idUsuari" value="<?php echo $idUsuari ?>">
            <label for="nomTasca">Tasca</label>
            <input name="nomTasca" placeholder="Introdueix el nom de la tasca" type="text" required>
            <label for="dataInici">Data</label>
            <input type="datetime-local" placeholder="YYYY-MM-DD hh:mm:ss" name="dataInici" required>
            <label for="descripcioTasca">Descripció</label>
            <textarea name="descripcioTasca" rows="3">
            <button name="accio" value="novaTasca">Crear</button>
        </form>
    </section>
</body>
</html>