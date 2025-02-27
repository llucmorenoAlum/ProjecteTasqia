<?php
    require_once 'app/models/NotesModel.php';

    function crearNovaNota($idUsuari, $titolNota, $contingutNota){
        $pdo = conectarBD();
        if(insertNota($pdo, $idUsuari, $titolNota, $contingutNota)){
            return true;
        }else{
            return false;
        }

    }

    function getNotes($idUsuari){
        $pdo = conectarBD();
        $notes = getNotesUsuari($pdo, $idUsuari);
        return $notes;
    }

    function modificarTasca($idTasca, $nomTasca, $dataTasca, $descripcioTasca){
        $pdo = conectarBD();
        if (updateTasca($pdo, $idTasca, $nomTasca, $dataTasca, $descripcioTasca)) {
            return true;
        } else {
            return false;
        }
    }