<?php
require_once 'app/models/TasquesModel.php';
require_once 'app/models/NotesModel.php';
require_once 'config/database.php';
require_once 'app/helpers/sessionHelper.php';
require_once 'app/helpers/dateHelper.php';

function mostrarIndex(){
    $pdo = conectarBD();
    $idUsuari = $_SESSION['id_usuari'];
    $tasquesPendents = getTasquesActives($pdo, $idUsuari);
    $tasquesCompletades = getTasquesCompletades($pdo);
    $data = obtenirDataActual();
    $tasquesAvui = getTasquesDia($pdo, $data);
    require 'app/views/index.php';
}
function mostrarCreacioTasques($error = ""){
    $error;
    $idUsuari = $_SESSION['id_usuari'];
    require_once 'app/views/creartasca.php';
}
function mostrarCreacioNotes($error = ""){
    $error;
    $idUsuari = $_SESSION['id_usuari'];
    require_once 'app/views/crearNota.php';
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
    $idUsuari = $_SESSION['id_usuari'];
    $pdo = conectarBD();
    $notes = getNotesUsuari($pdo, $idUsuari);
    require_once 'app/views/notes.php';
}

function mostrarEditorTasca($idTasca, $nomTasca, $dataTasca, $descTasca, $error = ""){
    $error;
    $idTasca;
    $nomTasca;
    $dataTasca;
    $descTasca;
    require_once 'app/views/editarTasca.php';
}

function mostrarEditorNota($idNota, $titolNota, $contingutNota, $error = ""){
    $error;
    $idNota;
    $titolNota;
    $contingutNota;
    require_once 'app/views/editarNota.php';
}

function crearSessio($correu){
    $pdo = conectarBD();
    $dades = getDadesUsuari($pdo, $correu);
    guardarSessio($dades);
}