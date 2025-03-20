<?php

function crearRutina($idUsuari, $nom, $descripcio, $hora, $diesPersonalitzats){
    $pdo = conectarBD();
    if(insertRutina($pdo, $idUsuari, $nom, $descripcio, $hora, $diesPersonalitzats)){
        return true;
    }else{
        return false;
    }
}
