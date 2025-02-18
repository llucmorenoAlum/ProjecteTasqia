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

function getTasquesActives($pdo, $idUsuari) {
    try {  
        // Comprovem si l'usuari està autenticat
        if (!isset($_SESSION['id_usuari'])) {
            throw new Exception("Error: Usuari no identificat.");
        }

        // Consulta segura amb prepared statements
        $sql = "SELECT * FROM tasques WHERE estat = :estat AND id_usuari = :idUsuari";
        $stmt = $pdo->prepare($sql);
        $estat = 'activa'; 
        $stmt->bindParam(':estat', $estat, PDO::PARAM_STR);
        $stmt->bindParam(':idUsuari', $idUsuari, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna un array associatiu

    } catch (Exception $e) {
        error_log("Error en getTasquesActives: " . $e->getMessage()); // Guarda l'error al log
        return []; // Retorna un array buit en cas d'error per evitar errors fatals
    }
}

function getTasquesCompletades($pdo) {
    try {  
        $sql = "SELECT * FROM tasques WHERE estat = :estat";
        $stmt = $pdo->prepare($sql);
        $estat = 'completada';
        $stmt->bindParam(':estat', $estat, PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        error_log("Error en getTasquesCompletades: " . $e->getMessage());
        return [];
    }
}

function getTasquesDia($pdo, $data) {
    try {
        $sql = "SELECT * FROM tasques WHERE data_inici = :data OR data_limit = :data";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':data', $data, PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        error_log("Error en getTasquesDia: " . $e->getMessage());
        return [];
    }
}

function insertTasca($pdo, $idUsuari, $nomTasca, $dataInici, $descripcio = null){
    try {
        $date = new DateTime($dataInici);
        $dataInici = $date->format('Y-m-d H:i:s');

        // Valor per defecte per a l'estat
        $estat = 'pendent';

        // Construir la consulta SQL segons si hi ha descripció o no
        if ($descripcio !== null) {
            $sql = "INSERT INTO tasques (id_usuari, nom, descripcio, data_inici, estat) 
                    VALUES (:idusuari, :nom, :descripcio, :dataInici, :estat)";
        } else {
            $sql = "INSERT INTO tasques (id_usuari, nom, data_inici, estat) 
                    VALUES (:idusuari, :nom, :dataInici, :estat)";
        }

        $stmt = $pdo->prepare($sql);

        // Lligar els valors comuns
        $stmt->bindParam(':idusuari', $idUsuari, PDO::PARAM_INT);
        $stmt->bindParam(':nom', $nomTasca, PDO::PARAM_STR);
        $stmt->bindParam(':dataInici', $dataInici, PDO::PARAM_STR);
        $stmt->bindParam(':estat', $estat, PDO::PARAM_STR);

        // Lligar la descripció només si s'ha definit
        if ($descripcio !== null) {
            $stmt->bindParam(':descripcio', $descripcio, PDO::PARAM_STR);
        }

        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error en insertTasca: " . $e->getMessage());
        return false;
    }
}


