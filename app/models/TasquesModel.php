<?php

function getTasques($pdo){
    $sql = 'SELECT * FROM tasques';
    $tasques = $pdo->query($sql);
    return $tasques;
}

function getTasquesPendents($pdo){
    $sql = "SELECT * FROM tasques WHERE estat = 'pendent'";
    $tasquesPendents = $pdo->query($sql);
    return $tasquesPendents;
}