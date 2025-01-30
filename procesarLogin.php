<?php

    $usuari = htmlspecialchars($_POST['usuari']);
    $correu = htmlspecialchars($_POST['email']);
    $contrasenya = htmlspecialchars($_POST['contrasenya']);

    loginUsuari($pdo, $usuari, $correu, $contrasenya);
?>