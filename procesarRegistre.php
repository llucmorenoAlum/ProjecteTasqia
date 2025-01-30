<?php
    require_once 'Scripts/funcions.php';
    require_once 'Scripts/connexioBD.php';

    $usuari = $_POST['usuari'];
    $correu = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];
    $contrasenya2 = $_POST['contrasenya2'];

    if (comprovarDadesRegistre($pdo, $usuari, $correu, $contrasenya, $contrasenya2)) {
        registrarUsuari($pdo, $usuari, $correu, $contrasenya);
    }