<?php
    require_once 'app/controllers/indexController.php';
    require_once 'app/controllers/loginController.php';
session_start();

// Comprova si l'usuari ha iniciat sessió
if (!isset($_SESSION['usuari_id'])) {
    // Redirigeix a la pàgina de login
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['accio']) && $_POST['action'] === 'registre') {
            mostrarRegistre();
        }
    }else{
        mostrarlogin();
    }
}else{
    mostrarIndex();
}
?>
