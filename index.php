<?php
    require_once 'app/controllers/indexController.php';
    require_once 'app/controllers/loginController.php';
session_start();

// Comprova si l'usuari ha iniciat sessió
if (!isset($_SESSION['usuari_id'])) {
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

            registrarUsuari($usuari, $correu, $contrasenya, $contrasenya2);
            mostrarlogin();
        }
        elseif (isset($_POST['accio']) && $_POST['accio'] === 'login') {
            $usuari = htmlspecialchars($_POST['usuari']);
            $correu = htmlspecialchars($_POST['email']);
            $contrasenya = htmlspecialchars($_POST['contrasenya']);
            
            if(loginUsuari($usuari, $correu, $contrasenya)){
                mostrarIndex();
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
