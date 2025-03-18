<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
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
            
            <label for="descripcioRutina">Descripció</label>
            <textarea placeholder="Introdueix la descripció de la rutina..." name="descripcioRutina" rows="3"></textarea>
            
            <label for="recurrencia">Repetició</label>
            <select name="repeticio" id="recurrencia">
                <option value="diaria">Diària</option>
                <option value="setmanal">Setmanal</option>
                <option value="personalitzada">Personalitzada</option>
            </select>

            <!-- Dies de la setmana ocults per defecte -->
            <div id="dies-setmana" class="dies-setmana" style="display: none;">
                <label>Dies de la setmana:</label><br>
                <input type="checkbox" name="dies[]" value="dilluns"> Dilluns
                <input type="checkbox" name="dies[]" value="dimarts"> Dimarts
                <input type="checkbox" name="dies[]" value="dimecres"> Dimecres
                <input type="checkbox" name="dies[]" value="dijous"> Dijous
                <input type="checkbox" name="dies[]" value="divendres"> Divendres
                <input type="checkbox" name="dies[]" value="dissabte"> Dissabte
                <input type="checkbox" name="dies[]" value="diumenge"> Diumenge
            </div>

            <button name="accio" value="novaRutina">Crear</button>
        </form>
    </section>

    <script>
        // Captura del select i del div amb els dies
        const recurrenciaSelect = document.getElementById("recurrencia");
        const diesSetmanaDiv = document.getElementById("dies-setmana");

        // Funció per mostrar o amagar els dies segons l'opció seleccionada
        recurrenciaSelect.addEventListener("change", function() {
            if (this.value === "personalitzada") {
                diesSetmanaDiv.style.display = "block"; // Mostra els dies
            } else {
                diesSetmanaDiv.style.display = "none";  // Oculta els dies
            }
        });
    </script>
</body>
</html>
