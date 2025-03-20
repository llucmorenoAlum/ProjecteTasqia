<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/btnCrear.css">
</head>
<body>
    <?php 
        require_once 'app/controllers/indexController.php';
        require_once 'app/views/header.php';
        require_once 'app/helpers/dateHelper.php';
    ?>
    <main>
        <?php 
            if(isset($error)):
                if ($error != ""):?>
                    <div class="errorWarning">
                        <div class="error__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>
                        </div>
                        <div class="error__title"><?php echo $error?></div>
                        <div class="error__close"><svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20"><path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path></svg></div>
                    </div>
                <?php endif;
            endif;
        ?>
        <section id="rutinesUsuari">
            <h3>Rutines:</h3>
            <?php 
                if (!empty($rutines)) : ?>
                    <div class="container">
                        <?php foreach ($rutines as $rutina) : ?>
                            <div class="tasca">
                                <!-- Contenidor del text -->
                                <div class="tasca-contenidor">
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="editarRutinaId" value="<?php echo $rutina['id_rutina'] ?>">
                                        <input type="hidden" name="editarRutinaNom" value="<?php echo $rutina['nom'] ?>">
                                        <input type="hidden" name="editarRutinaHora" value="<?php echo $rutina['hora'] ?>">
                                        <input type="hidden" name="editarRutinaDesc" value="<?php echo $rutina['descripcio'] ?>">
                                        <button class="botoInvisible" type="submit">
                                            <div class="nom">
                                                <?php echo htmlspecialchars($rutina['nom']) . ' | ' . substr(htmlspecialchars($rutina['hora']), 0, 5); ?>
                                            </div>
                                            <?php if (!empty($rutina['descripcio'])) : ?>
                                                <div class="descripcio">
                                                    <?php echo htmlspecialchars($rutina['descripcio']); ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($rutina['dies'])) : ?>
                                                <div class="dies">
                                                    <strong>Dies:</strong> <?php echo implode(", ", $rutina['dies']); ?>
                                                </div>
                                            <?php endif; ?>
                                        </button>
                                    </form>
                                </div>

                                <!-- Botons a la dreta -->
                                <div class="botons">
                                    <form action="index.php" method="POST">
                                        <input type="hidden" name="eliminarRutina" value="<?php echo $rutina['id_rutina']; ?>">
                                        <button type="submit" class="eliminar"><img src="public/media/borrar.webp" alt="✖"></button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <p>No tens cap rutina</p>
                <?php endif;
            ?>
        </section>

        <form action="index.php" method="post">
            <button name="accio" value="crearRutina" class="Btn">
                <div class="sign">+</div>        
                <div class="text">Rutina</div>
            </button>
        </form>
    </main>
</body>
</html>