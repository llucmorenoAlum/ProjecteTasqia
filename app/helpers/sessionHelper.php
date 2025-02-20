<?php
    function guardarSessio($dades){
        $_SESSION['usuari'] = $dades['correu'];
        $_SESSION['id_usuari'] = $dades['id_usuari'];
        $_SESSION['nom'] = $dades['nom'];
    }
