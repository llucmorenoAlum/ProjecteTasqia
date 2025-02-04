<?php
require_once 'app/models/TasquesModel.php';
require_once 'config/database.php';

function mostrarIndex(){
    $pdo = conectarBD();
    $tasquesPendents = getTasquesPendents($pdo);
    $tasquesEnProces = getTasquesEnProces($pdo);
    $tasquesCompletades = gettasquesCompletades($pdo);
    
    require 'app/views/index.php';
}