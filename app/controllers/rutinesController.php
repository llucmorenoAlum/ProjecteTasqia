<?php

function getRutines(){
    
}

function crearRutina($idUsuari, $nom, $descripcio, $recurrencia, $diesPersonalitzats){
    $pdo = conectarBD();
    if(insertRutina($pdo, $idUsuari, $nom, $descripcio, $recurrencia, $diesPersonalitzats)){
        return true;
    }else{
        return false;
    }
}
