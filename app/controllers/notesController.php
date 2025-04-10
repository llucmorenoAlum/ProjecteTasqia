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

    function modificarNota($idNota, $titolNota, $contingutNota){
        $pdo = conectarBD();
        if (updateNota($pdo, $idNota, $titolNota, $contingutNota)) {
            return true;
        } else {
            return false;
        }
    }

    function eliminarNota($idNota){
        $pdo = conectarBD();
        if(deleteNota($pdo, $idNota)){
            return true;
        }else{
            return false;
        }
    }