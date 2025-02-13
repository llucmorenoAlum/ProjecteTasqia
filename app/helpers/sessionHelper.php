<?php
    function guardarSessio($dades){
        $_SESSION['correu'] = $dades['correu'];
        $_SESSION['id_usuari'] = $dades['id_usuari'];
    }
