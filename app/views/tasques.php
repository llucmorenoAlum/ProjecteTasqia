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
        <section id="tasquesActives">
            <h3>Tàsques a completar:</h3>
            <?php if (!empty($tasquesPendents)) : ?>
                <div class="container">
                    <?php foreach ($tasquesPendents as $tasca) : ?>
                        <div class="tasca">
                            <!-- Contenidor del text -->
                            <div class="tasca-contenidor">
                                <form action="index.php" method="post">
                                    <input type="hidden" name="editarTasca" value="<?php echo $tasca['nom'] ?>">
                                    <input type="hidden" name="editarTascaData" value="<?php echo $tasca['data_inici'] ?>">
                                    <input type="hidden" name="editarTascaDesc" value="<?php echo $tasca['descripcio'] ?>">
                                    <input type="hidden" name="editarTascaId" value="<?php echo $tasca['id_tasca']?>"/>
                                    <button class="botoInvisible" type="submit">
                                        <div class="nom">
                                            <?php echo htmlspecialchars($tasca['nom']); ?>
                                        </div>
                                        <div class="data">
                                            <?php echo formatDataEnCatala(htmlspecialchars($tasca['data_inici'])); ?>
                                        </div>
                                        <?php if (!empty($tasca['descripcio'])) : ?>
                                            <div class="descripcio">
                                                <?php echo htmlspecialchars($tasca['descripcio']); ?>
                                            </div>
                                        <?php endif; ?>
                                    </button>
                                </form>
                            </div>

                            <!-- Botons a la dreta -->
                            <div class="botons">
                                <form action="index.php" method="POST">
                                    <input type="hidden" name="tascaCompletada" value="<?php echo $tasca['id_tasca']; ?>">
                                    <button type="submit" class="completar"><img src="public/media/completado.webp" alt="✔"></button>
                                </form>

                                <form action="index.php" method="POST">
                                    <input type="hidden" name="eliminarTasca" value="<?php echo $tasca['id_tasca']; ?>">
                                    <button type="submit" class="eliminar"><img src="public/media/borrar.webp" alt="✖"></button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p>No tens cap tasca</p>
            <?php endif; ?>
        </section>
        <section id="tasquesCompletades">
            <h3>Tàsques completades:</h3>
            <?php 
                if (!empty($tasquesCompletades)) : ?>
                    <div class="container">
                        <?php foreach ($tasquesCompletades as $tasca) : ?>
                            <div class="tasca">
                            <!-- Contenidor del text -->
                            <div class="tasca-contenidor">
                                <form action="index.php" method="post">
                                    <input type="hidden" name="editarTasca" value="<?php echo $tasca['nom'] ?>">
                                    <input type="hidden" name="editarTascaData" value="<?php echo $tasca['data_inici'] ?>">
                                    <input type="hidden" name="editarTascaDesc" value="<?php echo $tasca['descripcio'] ?>">
                                    <input type="hidden" name="editarTascaId" value="<?php echo $tasca['id_tasca']?>"/>

                                    <button class="botoInvisible" type="submit">
                                        <div class="nom">
                                            <?php echo htmlspecialchars($tasca['nom']); ?>
                                        </div>
                                        <div class="data">
                                            <?php echo formatDataEnCatala(htmlspecialchars($tasca['data_inici'])); ?>
                                        </div>
                                        <?php if (!empty($tasca['descripcio'])) : ?>
                                            <div class="descripcio">
                                                <?php echo htmlspecialchars($tasca['descripcio']); ?>
                                            </div>
                                        <?php endif; ?>
                                    </button>
                                </form>
                            </div>

                            <!-- Botons a la dreta -->
                            <div class="botons">
                                <form action="index.php" method="POST">
                                    <input type="hidden" name="tascaNoCompletada" value="<?php echo $tasca['id_tasca']; ?>">
                                    <button type="submit" class="deshacer"><img src="public/media/deshacer.webp" alt="<-"></button>
                                </form>

                                <form action="index.php" method="POST">
                                    <input type="hidden" name="eliminarTasca" value="<?php echo $tasca['id_tasca']; ?>">
                                    <button type="submit" class="eliminar"><img src="public/media/borrar.webp" alt="✖"></button>
                                </form>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <p>No tens cap tasca</p>
                <?php endif;
                ?>
        </section>
        <section id="tasquesDia">
            <h3>Avui | Dilluns 3 de Febrer de 2025</h3>
            <?php 
                if (!empty($tasquesAvui)) : ?>
                    <ul>
                        <?php foreach ($tasquesAvui as $tascaAvui) : ?>
                            <li>
                                <?php echo htmlspecialchars($tascaAvui['nom']); ?>
                                 - 
                                <?php echo htmlspecialchars($tascaAvui['descripcio']); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>No tens cap tasca</p>
                <?php endif;
                ?>
        </section>
        <form action="index.php" method="post">
            <!-- <button name="accio" value="crearTasca" class="btnCrear">+</button> -->
            <!-- From Uiverse.io by Yaya12085 --> 
            <button name="accio" value="crearTasca" class="Btn">
                <div class="sign">+</div>        
                <div class="text">Tasca</div>
            </button>
        </form>
    </main>
</body>
</html>