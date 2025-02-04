<?php
require_once 'app/models/TasquesModel.php';
require_once 'config/database.php';

function mostrarIndex(){
    $pdo = conectarBD();
    echo $pdo;
    //$tasquesPendents = getTasques($pdo);
    require 'app/views/index.php';
}