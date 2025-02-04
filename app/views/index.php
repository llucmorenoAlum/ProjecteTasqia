<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="./public/css/styles.css">
</head>
<?php 
        require_once 'app/views/header.php';
        require_once 'app/controllers/indexController.php';
    ?>
<body>

    <main>
        <section id="tasquesActives">
            <p>Tàsques a completar:</p>
            <?php 
                if($tasquesPendents->rowcount() >= 0):?>
                    <ul>
                        <?php while ($tasca = $tasquesPendents->fetch()) :?>
                            <li><?php echo $tasca['nom']?> - <?php echo $tasca['descripcio']?></li>
                        <?php endwhile ?>
                    </ul>
                <?php else:?>
                    <h2>No s'ha trobat cap pelicula</h2>
                <?php endif;
                ?>
        </section>
        <section id="tasquesEnProces"><p>Tàsques en procés:</p></section>
        <section id="tasquesCompletades"><p>Tàsques completades:</p></section>
        <section id="tasquesDia"><h3>Avui | Dilluns 3 de Febrer de 2025</h3><p>Entregar pràctica 3 - M06</p></section>
    </main>
</body>
</html>