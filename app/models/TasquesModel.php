<?php

function getTasques($pdo){
    try {  
        $sql = 'SELECT * FROM tasques';
        $tasques = $pdo->query($sql);
        return $tasques;
    } catch (PDOException $e) {?>
        <h2>ERROR: <?php echo $e?></h2><?php
    }
}

function getTasquesPendents($pdo){
    try {  
        $sql = "SELECT * FROM tasques WHERE estat = 'pendent'";
        $tasquesPendents = $pdo->query($sql);
        return $tasquesPendents;
    } catch (PDOException $e) {?>
        <h2>ERROR: <?php echo $e?></h2><?php
    }
}

function getTasquesEnProces($pdo){
    try {  
        $sql = "SELECT * FROM tasques WHERE estat = 'en procés'";
        $tasquesPendents = $pdo->query($sql);
        return $tasquesPendents;
    } catch (PDOException $e) {?>
        <h2>ERROR: <?php echo $e?></h2><?php
    }
}

function getTasquesCompletades($pdo){
    try {  
        $sql = "SELECT * FROM tasques WHERE estat = 'completada'";
        $tasquesPendents = $pdo->query($sql);
        return $tasquesPendents;
    } catch (PDOException $e) {?>
        <h2>ERROR: <?php echo $e?></h2><?php
    }
}

