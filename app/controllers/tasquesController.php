<?php
    require_once 'app/models/TasquesModel.php';

    function crearNovaTasca($idUsuari, $nomTasca, $dataTasca, $descripcioTasca){
        $pdo = conectarBD();
        return insertTasca($pdo, $idUsuari, $nomTasca, $dataTasca, $descripcioTasca);
    }
    function tascaCompletada($idTasca){
        $pdo = conectarBD();
        return completarTasca($pdo, $idTasca);
    }

    function eliminarTasca($idTasca){
        $pdo = conectarBD();
        return deleteTasca($pdo, $idTasca);
    }