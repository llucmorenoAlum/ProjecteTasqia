<?php
require_once 'app/models/TasquesModel.php';
require_once 'config/database.php';

function mostrarIndex(){
    $pdo = conectarBD();
    //$tasquesPendents = getTasquesPendents($pdo);
    require 'app/views/index.php';
}