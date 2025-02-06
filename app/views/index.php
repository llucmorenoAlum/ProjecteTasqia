<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="./public/css/styles.css">
</head>
<body>
    <?php 
        require_once 'app/views/header.php';
        require_once 'app/controllers/indexController.php';
    ?>
    <section id="crearTasques"><button>Crear tasca +</button></section>
    <main>
        <section id="tasquesActives">
            <h3>Tàsques a completar:</h3>
            <?php 
                if($tasquesPendents->rowcount() > 0):?>
                    <ul>
                        <?php while ($tascaPendent = $tasquesPendents->fetch()) :?>
                            <li><?php echo $tascaPendent['nom']?> - <?php echo $tascaPendent['descripcio']?></li>
                        <?php endwhile ?>
                    </ul>
                <?php else:?>
                    <p>No tens cap tasca</p>
                <?php endif;
                ?>
        </section>
        <section id="tasquesCompletades">
            <h3>Tàsques completades:</h3>
            <?php 
                if($tasquesCompletades->rowcount() > 0):?>
                    <ul>
                        <?php while ($tasca = $tasquesCompletades->fetch()) :?>
                            <li><?php echo $tasca['nom']?> - <?php echo $tasca['descripcio']?></li>
                        <?php endwhile ?>
                    </ul>
                <?php else:?>
                    <p>No tens cap tasca</p>
                <?php endif;
                ?>
        </section>
        <section id="tasquesDia">
            <h3>Avui | Dilluns 3 de Febrer de 2025</h3>
            <?php 
                if($tasquesDia->rowcount() > 0):?>
                    <ul>
                        <?php while ($tasca = $tasquesDia->fetch()) :?>
                            <li><?php echo $tasca['nom']?> - <?php echo $tasca['descripcio']?>  <?php $tasca['data_limit']?></li>
                        <?php endwhile ?>
                    </ul>
                <?php else:?>
                    <p>No tens cap tasca</p>
                <?php endif;
                ?>
            <p>Entregar pràctica 3 - M06</p>
        </section>
    </main>
</body>
</html>