<?php
    require_once 'app/models/TasquesModel.php';

    function crearNovaTasca($idUsuari, $nomTasca, $dataTasca, $descripcioTasca){
        $pdo = conectarBD();
        insertTasca($pdo, $idUsuari, $nomTasca, $dataTasca, $descripcioTasca);
    }