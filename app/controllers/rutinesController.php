<?php

function crearRutina($idUsuari, $nom, $descripcio, $hora, $diesPersonalitzats){
    $pdo = conectarBD();
    if(insertRutina($pdo, $idUsuari, $nom, $descripcio, $hora, $diesPersonalitzats)){
        return true;
    }else{
        return false;
    }
}

function eliminarRutina($idRutina){
    $pdo = conectarBD();
    if (deleteRutina($pdo, $idRutina)) {
        return true;
    } else {
        return false;
    }
    
}
