<?php
session_start();

// Comprova si l'usuari ha iniciat sessió
if (!isset($_SESSION['usuari_id'])) {
    // Redirigeix a la pàgina de login
    header('Location: /login.php');
    exit();
}else{
    require_once './app/views/index.php';
}
?>
