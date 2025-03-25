<?php

function getDiesRutina($idRutina){
    $pdo = conectarBD();
    // if(obtenirDiesRutina($pdo, $idRutina)){
    //     return true;
    // }else{
    //     return false;
    // }
    return obtenirDiesRutina($pdo, $idRutina);
}

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
