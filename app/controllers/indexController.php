<?php
require_once 'app/models/TasquesModel.php';
require_once 'config/database.php';

function mostrarIndex(){
    $pdo = conectarBD();
    $tasquesPendents = getTasquesActives($pdo);
    $tasquesCompletades = getTasquesCompletades($pdo);
    $tasquesDia = getTasquesDia($pdo);
    require 'app/views/index.php';
}