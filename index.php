<?php
    require_once 'app/controllers/indexController.php';
/*session_start();

// Comprova si l'usuari ha iniciat sessió
if (!isset($_SESSION['usuari_id'])) {
    // Redirigeix a la pàgina de login
    require_once app/views/login.php'
}else{
    require_once 'app/views/index.php';
}*/
mostrarIndex();

?>
