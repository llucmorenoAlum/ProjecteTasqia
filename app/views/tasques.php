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
        <section id="tasquesActives">
            <h3>Tàsques a completar:</h3>
            <?php if (!empty($tasquesPendents)) : ?>
                <div class="container">
                    <?php foreach ($tasquesPendents as $tascaPendent) : ?>
                        <div class="tasca">
                            <!-- Contenidor del text -->
                            <div class="tasca-contenidor">
                                <form action="index.php" method="post">
                                    <input type="hidden" name="editarTasca" value="<?php echo $tascaPendent['nom'] ?>">
                                    <input type="hidden" name="editarTascaData" value="<?php echo $tascaPendent['data_inici'] ?>">
                                    <input type="hidden" name="editarTascaDesc" value="<?php echo $tascaPendent['descripcio'] ?>">
                                    <button class="botoInvisible" type="submit">
                                        <div class="nom">
                                            <?php echo htmlspecialchars($tascaPendent['nom']); ?>
                                        </div>
                                        <div class="data">
                                            <?php echo formatDataEnCatala(htmlspecialchars($tascaPendent['data_inici'])); ?>
                                        </div>
                                        <?php if (!empty($tascaPendent['descripcio'])) : ?>
                                            <div class="descripcio">
                                                <?php echo htmlspecialchars($tascaPendent['descripcio']); ?>
                                            </div>
                                        <?php endif; ?>
                                    </button>
                                </form>
                            </div>

                            <!-- Botons a la dreta -->
                            <div class="botons">
                                <form action="index.php" method="POST">
                                    <input type="hidden" name="tascaCompletada" value="<?php echo $tascaPendent['id_tasca']; ?>">
                                    <button type="submit" class="completar"><img src="public/media/comprobado.png" alt="✔"></button>
                                </form>

                                <form action="index.php" method="POST">
                                    <input type="hidden" name="eliminarTasca" value="<?php echo $tascaPendent['id_tasca']; ?>">
                                    <button type="submit" class="eliminar"><img src="public/media/borrar.png" alt="✖"></button>
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
                    <ul>
                        <?php foreach ($tasquesCompletades as $tascaCompletada) : ?>
                            <li>
                                <?php echo htmlspecialchars($tascaCompletada['nom']); ?>
                                 - 
                                <?php echo htmlspecialchars($tascaCompletada['descripcio']); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
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