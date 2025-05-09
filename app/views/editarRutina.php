<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Rutina - Tasqia</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/checkbox.css">
</head>
<body>
    <?php require_once 'app/views/sortir.php' ?>
    <main>
    <h1>Editar Rutina</h1>
    <?php 
        $error = $error ?? "";
        if ($error != ""): ?>
            <div class="errorWarning">
                <div class="error__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none">
                        <path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path>
                    </svg>
                </div>
                <div class="error__title"><?php echo $error; ?></div>
            </div>
    <?php endif; ?>

    <section class="formulari">
        <form action="index.php" method="post">
            <input type="hidden" name="updateRutina" value="<?php echo $idRutina; ?>">
            
            <label for="nomRutina">Rutina</label>
            <input name="nomRutina" placeholder="Introdueix el nom de la rutina..." type="text" required value="<?php echo $nomRutina; ?>">
            
            <label for="horaRutina">Hora</label>
            <input type="time" name="horaRutina" id="hora" value="<?php echo $horaRutina; ?>">

            <label for="descripcioRutina">Descripció</label>
            <textarea placeholder="Introdueix la descripció de la rutina..." name="descripcioRutina" rows="3"><?php echo $descripcioRutina; ?></textarea>

            <!-- Dies de la setmana -->
            <div id="dies-setmana" class="dies-setmana">
                <label>Dies de la setmana:</label><br>
                <?php 
                    $diesSetmana = ["dilluns", "dimarts", "dimecres", "dijous", "divendres", "dissabte", "diumenge"];
                    foreach ($diesSetmana as $index => $dia):
                        $checked = in_array($dia, $diesRutina) ? 'checked' : '';
                ?>
                    <div class="checkbox-wrapper-46">
                        <input type="checkbox" id="cbx-46-<?php echo $index + 1; ?>" class="inp-cbx" name="dies[]" value="<?php echo $dia; ?>" <?php echo $checked; ?> />
                        <label for="cbx-46-<?php echo $index + 1; ?>" class="cbx">
                            <span>
                                <svg viewBox="0 0 12 10" height="10px" width="12px">
                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                </svg>
                            </span>
                            <span><?php echo $dia; ?></span>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="submit">Guardar Canvis</button>
        </form>
    </section>
    </main>
</body>
</html>
