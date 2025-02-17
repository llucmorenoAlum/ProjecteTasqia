<?php
    require_once 'app/controllers/indexController.php';
    require_once 'app/controllers/loginController.php';

    session_start();

// Comprova si l'usuari ha iniciat sessió
    if (!isset($_SESSION['usuari'])) {
        // Redirigeix a la pàgina de login
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['accio']) && $_POST['accio'] === 'crearTasca'){
                mostrarCreacioTasques();
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
            elseif (isset($_POST['accio']) && $_POST['accio'] === 'registre') {
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
        mostrarIndex();
    }
?>
