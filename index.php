<?php
    require_once 'app/controllers/indexController.php';
    require_once 'app/controllers/loginController.php';
    require_once 'app/controllers/tasquesController.php';
    require_once 'app/controllers/notesController.php';
    require_once 'app/controllers/rutinesController.php';

    session_start();

// Comprova si l'usuari ha iniciat sessió
    if (!isset($_SESSION['usuari'])) {
        // Redirigeix a la pàgina de login
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if (isset($_POST['accio']) && $_POST['accio'] === 'registre') {
                mostrarRegistre();
            }
            elseif(isset($_POST['accio']) && $_POST['accio'] === 'registrarse'){
                $usuari = htmlspecialchars($_POST['usuari']);
                $correu = htmlspecialchars($_POST['email']);
                $contrasenya = htmlspecialchars($_POST['contrasenya']);
                $contrasenya2 = htmlspecialchars($_POST['contrasenya2']);

                if(registrarUsuari($usuari, $correu, $contrasenya, $contrasenya2)){
                    mostrarlogin();
                }else{
                    $error = "Aquest correu ja està registrat";
                    mostrarRegistre($error);
                }
            }
            elseif (isset($_POST['accio']) && $_POST['accio'] === 'login') {
                $correu = htmlspecialchars($_POST['email']);
                $contrasenya = htmlspecialchars($_POST['contrasenya']);
                
                if(loginUsuari($correu, $contrasenya)){
                    crearSessio($correu);
                    mostrarIndex();
                }else{
                    $error = "Inici de sessió incorrecte";
                    mostrarlogin($error);
                }
            }
            else{
                mostrarlogin();
            }
        }else{
            mostrarlogin();
        }
    }else{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['accio']) && $_POST['accio'] === 'crearTasca'){
                mostrarCreacioTasques();
            }
            elseif (isset($_POST['accio']) && $_POST['accio'] === 'crearRutina') {
                mostrarCreacioRutines();
            }
            elseif(isset($_POST['accio']) && $_POST['accio'] === 'crearNota'){
                mostrarCreacioNotes();
            }
            elseif (isset($_POST['accio']) && $_POST['accio'] === 'novaTasca') {
                $idUsuari = $_SESSION['id_usuari'];
                $nomTasca = $_POST['nomTasca'];
                $dataTasca = $_POST['dataInici'];
                $descripcioTasca = $_POST['descripcioTasca'];
 
                if(crearNovaTasca($idUsuari, $nomTasca, $dataTasca, $descripcioTasca)){
                    mostrarIndex();
                }else {
                    $error = "No s'ha pogut crear la tasca";
                    mostrarCreacioTasques($error);
                }
            }
            elseif (isset($_POST['accio']) && $_POST['accio'] === 'novaRutina') {
                $idUsuari = $_SESSION['id_usuari'];
                $nomRutina = $_POST['nomRutina'];
                $hora = $_POST['hora'];
                $horaCompleta = $hora . ':00';
                $descripcioRutina = $_POST['descripcioRutina'];
                
                // Comprovar si 'dies' existeix per evitar errors
                $dies_personalitzats = isset($_POST['dies']) ? $_POST['dies'] : [];
            
                if (crearRutina($idUsuari, $nomRutina, $descripcioRutina,$horaCompleta,$dies_personalitzats)) {
                    mostrarRutines();
                } else {
                    mostrarRutines($error = "No s'ha pogut crear la rutina");
                }
            }            
            elseif (isset($_POST['accio']) && $_POST['accio'] === 'novaNota') {
                $idUsuari = $_SESSION['id_usuari'];
                $titolNota = $_POST['titol'];
                $contingutNota = $_POST['contingutNota'];
    
                if(crearNovaNota($idUsuari, $titolNota, $contingutNota)){
                    mostrarNotes();
                }else {
                    $error = "No s'ha pogut crear la tasca";
                    mostrarCreacioNotes($error);
                }
            }
            elseif (isset($_POST['accio']) && $_POST['accio'] === 'mostrarTasques') {
                mostrarTasques();
            }
            elseif (isset($_POST['accio']) && $_POST['accio'] === 'mostrarRutines') {
                mostrarRutines();
            }
            elseif (isset($_POST['accio']) && $_POST['accio'] === 'mostrarCalendari') {
                mostrarCalendari();
            }
            elseif (isset($_POST['accio']) && $_POST['accio'] === 'mostrarNotes') {
                mostrarNotes();
            }
            elseif(isset($_POST['editarTasca'])){
                $nomTasca = $_POST['editarTasca'];
                $dataTasca = $_POST['editarTascaData'];
                $descripcioTasca = $_POST['editarTascaDesc'];
                $idTasca = $_POST['editarTascaId'];
                mostrarEditorTasca($idTasca, $nomTasca, $dataTasca, $descripcioTasca);
            }elseif(isset($_POST['updateTasca'])) {
                $idTasca = $_POST['updateTasca'];
                $nomTasca = $_POST['nomTasca'];
                $dataTasca = $_POST['dataInici'];
                $descripcioTasca = $_POST['descripcioTasca'];
                if(modificarTasca($idTasca, $nomTasca, $dataTasca, $descripcioTasca)){
                    mostrarTasques();
                }else{
                    $error = "No s'ha pogut modificar la tasca";
                    mostrarEditorTasca($idTasca, $nomTasca, $dataTasca, $descripcioTasca, $error);
                }
            }elseif (isset($_POST['modificarNota'])) {
                $idNota = $_POST['modificarNota'];
                $titolNota = $_POST['titolNota'];
                $contingutNota = $_POST['contingutNota'];
                mostrarEditorNota($idNota, $titolNota, $contingutNota);
            }
            elseif(isset($_POST['updateNota'])){
                $idNota = $_POST['updateNota'];
                $titolNota = $_POST['titolNota'];
                $contingutNota = $_POST['contingutNota'];
                if(modificarNota($idNota, $titolNota, $contingutNota)){
                    mostrarNotes();
                }else{
                    $error = "No s'ha pogut modificar la nota";
                    mostrarEditorNota($idNota, $titolNota, $contingutNota, $error);
                }
            }
            elseif (isset($_POST['eliminarTasca'])) {
                $idTasca = $_POST['eliminarTasca'];
                if(eliminarTasca($idTasca)){
                    mostrarTasques();
                }else{
                    mostrarTasques();
                }
            }
            elseif(isset($_POST['eliminarNota'])){
                $idNota = $_POST['eliminarNota'];
                if (eliminarNota($idNota)) {
                    mostrarNotes();
                }else{
                    $error = "No s'ha pogut eliminar la nota";
                    mostrarNotes($error);
                }
            }
            elseif (isset($_POST['tascaCompletada'])){
                $idTasca = $_POST['tascaCompletada'];
                if(tascaCompletada($idTasca)){
                    mostrarTasques();
                }
                else{
                    mostrarTasques();
                }
            }elseif(isset($_POST['tascaNoCompletada'])){
                $idTasca = $_POST['tascaNoCompletada'];
                if(tascaNoCompletada($idTasca)){
                    mostrarTasques();
                }
                else{
                    mostrarTasques();
                }
            }
        }else{
            mostrarIndex();
        }
    }
?>
