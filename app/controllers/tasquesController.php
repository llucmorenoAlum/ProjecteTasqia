<?php
    require_once 'app/models/TasquesModel.php';

    function crearNovaTasca($idUsuari, $nomTasca, $dataTasca, $descripcioTasca){
        $pdo = conectarBD();
        if(insertTasca($pdo, $idUsuari, $nomTasca, $dataTasca, $descripcioTasca)){
            return true;
        }else{
            return false;
        }

    }
    function tascaCompletada($idTasca){
        $pdo = conectarBD();
        if(completarTasca($pdo, $idTasca)){
            return true;
        }else{
            return false;
        }
    }

    function eliminarTasca($idTasca){
        $pdo = conectarBD();
        if(deleteTasca($pdo, $idTasca)){
            return true;
        }else{
            return false;
        }
    }

    function modificarTasca($idTasca, $nomTasca, $dataTasca, $descripcioTasca){
        $pdo = conectarBD();
        if (updateTasca($pdo, $idTasca, $nomTasca, $dataTasca, $descripcioTasca)) {
            return true;
        } else {
            return false;
        }
        
    }