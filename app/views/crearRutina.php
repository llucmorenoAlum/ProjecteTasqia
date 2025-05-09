<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/checkbox.css">
</head>
<body>
    <?php require_once 'app/views/sortir.php' ?>
    <main>
    <h1>Tasqia</h1>
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
                <div class="error__close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20">
                        <path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path>
                    </svg>
                </div>
            </div>
    <?php endif; ?>
    
    <section class="formulari">
        <form action="index.php" method="post">
            <label for="nomRutina">Rutina</label>
            <input name="nomRutina" placeholder="Introdueix el nom de la rutina..." type="text" required>
            
            <label for="hora">Hora</label>
            <input type="time" name="hora" id="hora" required>

            <label for="descripcioRutina">Descripció</label>
            <textarea placeholder="Introdueix la descripció de la rutina..." name="descripcioRutina" rows="3"></textarea>

            <!-- Dies de la setmana ocults per defecte -->
            <div id="dies-setmana" class="dies-setmana">
            <label>Dies de la setmana:</label><br>
            <div class="checkbox-wrapper-46">
                <input type="checkbox" id="cbx-46-1" class="inp-cbx" name="dies[]" value="Dilluns"/>
                <label for="cbx-46-1" class="cbx">
                    <span>
                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                    </span>
                    <span>Dilluns</span>
                </label>
            </div>
            <div class="checkbox-wrapper-46">
                <input type="checkbox" id="cbx-46-2" class="inp-cbx" name="dies[]" value="Dimarts"/>
                <label for="cbx-46-2" class="cbx">
                    <span>
                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                    </span>
                    <span>Dimarts</span>
                </label>
            </div>
            <div class="checkbox-wrapper-46">
                <input type="checkbox" id="cbx-46-3" class="inp-cbx" name="dies[]" value="Dimecres"/>
                <label for="cbx-46-3" class="cbx">
                    <span>
                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                    </span>
                    <span>Dimecres</span>
                </label>
            </div>
            <div class="checkbox-wrapper-46">
                <input type="checkbox" id="cbx-46-4" class="inp-cbx" name="dies[]" value="Dijous"/>
                <label for="cbx-46-4" class="cbx">
                    <span>
                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                    </span>
                    <span>Dijous</span>
                </label>
            </div>
            <div class="checkbox-wrapper-46">
                <input type="checkbox" id="cbx-46-5" class="inp-cbx" name="dies[]" value="Divendres"/>
                <label for="cbx-46-5" class="cbx">
                    <span>
                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                    </span>
                    <span>Divendres</span>
                </label>
            </div>
            <div class="checkbox-wrapper-46">
                <input type="checkbox" id="cbx-46-6" class="inp-cbx" name="dies[]" value="Dissabte"/>
                <label for="cbx-46-6" class="cbx">
                    <span>
                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                    </span>
                    <span>Dissabte</span>
                </label>
            </div>
            <div class="checkbox-wrapper-46">
                <input type="checkbox" id="cbx-46-7" class="inp-cbx" name="dies[]" value="Diumenge"/>
                <label for="cbx-46-7" class="cbx">
                    <span>
                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                    </span>
                    <span>Diumenge</span>
                </label>
            </div>
            </div>

            <button name="accio" value="novaRutina">Crear</button>
        </form>
    </section>
    </main>
</body>
</html>
