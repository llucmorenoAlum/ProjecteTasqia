<?php
function obtenirRutines($pdo, $idUsuari) {
    try {
        $sql = "SELECT * FROM rutina WHERE id_usuari = :idUsuari";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idUsuari', $idUsuari, PDO::PARAM_INT);
        $stmt->execute();
        $rutines = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Afegir els dies personalitzats si cal
        foreach ($rutines as &$rutina) {
            if ($rutina['recurrencia'] === 'personalitzada') {
                $sqlDies = "SELECT dia_setmana FROM dies_rutina WHERE id_rutina = :idRutina";
                $stmtDies = $pdo->prepare($sqlDies);
                $stmtDies->bindParam(':idRutina', $rutina['id_rutina'], PDO::PARAM_INT);
                $stmtDies->execute();
                $dies = $stmtDies->fetchAll(PDO::FETCH_COLUMN);
                if($dies){
                    $rutina['dies_personalitzats'] = $dies;
                }
            }
        }

        return $rutines;
    } catch (PDOException $e) {
        error_log("Error obtenint rutines: " . $e->getMessage());
        return false;
    }
}

function insertRutina($pdo, $idUsuari, $nom, $descripcio, $recurrencia, $diesPersonalitzats = []) {
    try {
        $pdo->beginTransaction();  // Comença la transacció

        // Crear la rutina principal
        $sql = "INSERT INTO rutina (id_usuari, nom, descripcio, recurrencia)
                VALUES (:idUsuari, :nom, :descripcio, :recurrencia)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':idUsuari' => $idUsuari,
            ':nom' => $nom,
            ':descripcio' => $descripcio,
            ':recurrencia' => $recurrencia
        ]);

        $idRutina = $pdo->lastInsertId();

        // Afegir els dies personalitzats si la recurrència és "personalitzada"
        if ($recurrencia === 'personalitzada' && !empty($diesPersonalitzats)) {
            $sqlDies = "INSERT INTO dies_rutina (id_rutina, dia_setmana) VALUES (:idRutina, :diaSetmana)";
            $stmtDies = $pdo->prepare($sqlDies);
            foreach ($diesPersonalitzats as $dia) {
                $stmtDies->execute([
                    ':idRutina' => $idRutina,
                    ':diaSetmana' => $dia
                ]);
            }
        }

        $pdo->commit();  // Confirma la transacció
        return $idRutina;
    } catch (PDOException $e) {
        $pdo->rollBack();  // Reverteix si hi ha error
        error_log("Error creant rutina: " . $e->getMessage());
        return false;
    }
}