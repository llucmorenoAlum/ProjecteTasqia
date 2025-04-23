<?php
require_once 'app/models/TasquesModel.php';
require_once 'app/models/RutinesModel.php';
require_once 'app/models/NotesModel.php';
require_once 'config/database.php';
require_once 'app/helpers/sessionHelper.php';
require_once 'app/helpers/dateHelper.php';

function mostrarIndex(){
    $pdo = conectarBD();
    $idUsuari = $_SESSION['id_usuari'];
    $data = obtenirDataActual();
    $dia = obtenirDiaActual();
    setlocale(LC_TIME, 'ca_ES.UTF-8'); 
    $titolDia = obtenirDiaActualComplet();
    $tasquesAvui = getTasquesDia($pdo, $data, $idUsuari);
    $rutinesAvui  = getRutinesDia($pdo, $dia, $idUsuari);
    $tasquesPendents = getTasquesActives($pdo, $idUsuari);
    $tasquesCompletades = getTasquesCompletades($pdo, $idUsuari);
    
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

function mostrarCreacioRutines($error = ""){
    $error;
    $idUsuari = $_SESSION['id_usuari'];
    require_once 'app/views/crearRutina.php';
}

function mostrarCalendari(){
    $pdo = conectarBD();
    $idUsuari = $_SESSION['id_usuari'];
    $tasquesUsuari = getTotesTasques($pdo, $idUsuari);
    require_once 'app/views/celendari.php';
}

function mostrarTasques(){
    $pdo = conectarBD();
    $idUsuari = $_SESSION['id_usuari'];
    $tasquesPendents = getTasquesActives($pdo, $idUsuari);
    $tasquesCompletades = getTasquesCompletades($pdo, $idUsuari);
    $data = obtenirDataActual();
    $tasquesDia = getTasquesDia($pdo, $data, $idUsuari);
    require_once 'app/views/tasques.php';
}

function mostrarRutines($error = "", $missatge = ""){
    $pdo = conectarBD();
    $error;
    $missatge;
    $idUsuari = $_SESSION['id_usuari'];
    $rutines = obtenirRutines($pdo, $idUsuari);
    require_once 'app/views/rutines.php';
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

function mostrarEditorRutina($idRutina, $nomRutina, $horaRutina, $descripcioRutina, $diesRutina){
    $idRutina;
    $nomRutina;
    $horaRutina;
    $descripcioRutina;
    $diesRutina;
    require_once 'app/views/editarRutina.php';
}

function mostrarEditorNota($idNota, $titolNota, $contingutNota, $error = ""){
    $error;
    $idNota;
    $titolNota;
    $contingutNota;
    require_once 'app/views/editarNota.php';
}

function mostrarPerfil(){
    require_once 'app/views/perfil.php';
}

function crearSessio($correu){
    $pdo = conectarBD();
    $dades = getDadesUsuari($pdo, $correu);
    guardarSessio($dades);
}