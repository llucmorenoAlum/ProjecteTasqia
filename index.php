<?php
    require_once 'app/controllers/indexController.php';
    require_once 'app/controllers/loginController.php';
    require_once 'app/controllers/tasquesController.php';
    require_once 'app/controllers/notesController.php';

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
            if(isset($_POST['accio']) && $_POST['accio'] === 'crearNota'){
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
            elseif (isset($_POST['accio']) && $_POST['accio'] === 'mostrarCalendari') {
                mostrarCalendari();
            }
            elseif (isset($_POST['accio']) && $_POST['accio'] === 'mostrarNotes') {
                mostrarNotes();
            }
            elseif(isset($_POST['editarTasca'])){
                $tasca = $_POST['editarTasca'];
                mostrarEditorTasca($tasca);
            }
            elseif (isset($_POST['eliminarTasca'])) {
                $idTasca = $_POST['eliminarTasca'];
                if(eliminarTasca($idTasca)){
                    mostrarTasques();
                }else{
                    mostrarTasques();
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
            }
        }else{
            mostrarIndex();
        }
    }
?>
