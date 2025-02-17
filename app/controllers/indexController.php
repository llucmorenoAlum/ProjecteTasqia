<?php
require_once 'app/models/TasquesModel.php';
require_once 'config/database.php';
require_once 'app/helpers/sessionHelper.php';
require_once 'app/helpers/dateHelper.php';

function mostrarIndex(){
    $pdo = conectarBD();
    $idUsuari = $_SESSION['id_usuari'];
    print_r($idUsuari);
    $tasquesPendents = getTasquesActives($pdo, $idUsuari);
    $tasquesCompletades = getTasquesCompletades($pdo);
    $data = obtenirDataActual();
    $tasquesDia = getTasquesDia($pdo, $data);
    require 'app/views/index.php';
}
function crearSessio($correu){
    $pdo = conectarBD();
    $dades = getDadesUsuari($pdo, $correu);
    guardarSessio($dades);
}