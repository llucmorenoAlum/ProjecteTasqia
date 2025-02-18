<?php
require_once 'app/models/TasquesModel.php';
require_once 'config/database.php';
require_once 'app/helpers/sessionHelper.php';
require_once 'app/helpers/dateHelper.php';

function mostrarIndex(){
    $pdo = conectarBD();
    $idUsuari = $_SESSION['id_usuari'];
    $tasquesPendents = getTasquesActives($pdo, $idUsuari);
    $tasquesCompletades = getTasquesCompletades($pdo);
    $data = obtenirDataActual();
    $tasquesDia = getTasquesDia($pdo, $data);
    require 'app/views/index.php';
}
function mostrarCreacioTasques(){
    $idUsuari = $_SESSION['id_usuari'];
    require_once 'app/views/creartasca.php';
}

function mostrarCalendari(){
    require_once 'app/views/celendari.php';
}

function mostrarTasques(){
    $pdo = conectarBD();
    $idUsuari = $_SESSION['id_usuari'];
    $tasquesPendents = getTasquesActives($pdo, $idUsuari);
    $tasquesCompletades = getTasquesCompletades($pdo);
    $data = obtenirDataActual();
    $tasquesDia = getTasquesDia($pdo, $data);
    require_once 'app/views/tasques.php';
}
function mostrarNotes(){
    require_once 'app/views/tasques.php';
}
function crearSessio($correu){
    $pdo = conectarBD();
    $dades = getDadesUsuari($pdo, $correu);
    guardarSessio($dades);
}