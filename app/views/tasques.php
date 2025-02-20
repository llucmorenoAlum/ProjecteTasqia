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
        require_once 'app/controllers/indexController.php';
        require_once 'app/views/header.php'
    ?>
    
    <main>
        <section id="tasquesActives">
            <h3>Tàsques a completar:</h3>
            <?php if (!empty($tasquesPendents)) : ?>
                <div class="container">
                    <?php foreach ($tasquesPendents as $tascaPendent) : ?>
                        <div class="tasca">
                            <div class="nom">
                                <?php echo htmlspecialchars($tascaPendent['nom']); ?>
                            </div>
                            <div class="data">
                                Inici: <?php echo htmlspecialchars($tascaPendent['data_inici']); ?>
                            </div>
                            <?php if (!empty($tascaPendent['descripcio'])) : ?>
                                <div class="descripcio">
                                    <?php echo htmlspecialchars($tascaPendent['descripcio']); ?>
                                </div>
                            <?php endif; ?>
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
            <button name="accio" value="crearTasca" class="btnCrear">+</button>
        </form>
    </main>
</body>
</html>