<?php
    require_once 'Scripts/funcions.php';
    require_once 'Scripts/connexioBD.php';

    $usuari = htmlspecialchars($_POST['usuari']);
    $correu = htmlspecialchars($_POST['email']);
    $contrasenya = htmlspecialchars($_POST['contrasenya']);
    $contrasenya2 = htmlspecialchars($_POST['contrasenya2']);

    if (comprovarUsuariExistent($pdo, $usuari, $correu, $contrasenya, $contrasenya2)) {
        registrarUsuari($pdo, $usuari, $correu, $contrasenya);
    }