<?php
function obtenirRutines($pdo, $idUsuari) {
    try {
        $sql = "SELECT * FROM rutines WHERE id_usuari = :idUsuari";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idUsuari', $idUsuari, PDO::PARAM_INT);
        $stmt->execute();
        $rutines = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rutines as &$rutina) {
            $sqlDies = "SELECT dia_setmana FROM dies_rutina WHERE id_rutina = :idRutina";
            $stmtDies = $pdo->prepare($sqlDies);
            $stmtDies->bindParam(':idRutina', $rutina['id_rutina'], PDO::PARAM_INT);
            $stmtDies->execute();
            $dies = $stmtDies->fetchAll(PDO::FETCH_COLUMN);
            if($dies){
                $rutina['dies'] = $dies;
            }
        }

        return $rutines;
    } catch (PDOException $e) {
        error_log("Error obtenint rutines: " . $e->getMessage());
        return false;
    }
}

function obtenirDiesRutina($pdo, $idRutina) {
    $sql = "SELECT dia_setmana FROM dies_rutina WHERE id_rutina = :idRutina";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idRutina', $idRutina, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function getRutinesDia($pdo, $dia) {
    try {
        $sql = "SELECT r.* FROM rutines r
                INNER JOIN dies_rutina dr ON r.id = dr.id_rutina
                WHERE dr.dia = :dia";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':dia', $dia, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en getRutinesDia: " . $e->getMessage());
        return [];
    }
}


function insertRutina($pdo, $idUsuari, $nom, $descripcio, $hora, $dies = []) {
    try {
        $pdo->beginTransaction();  // Comença la transacció

        // Crear la rutina principal
        $sql = "INSERT INTO rutines (id_usuari, nom, descripcio, hora)
                VALUES (:idUsuari, :nom, :descripcio, :hora)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':idUsuari' => $idUsuari,
            ':nom' => $nom,
            ':descripcio' => $descripcio,
            ':hora' => $hora
        ]);

        $idRutina = $pdo->lastInsertId();

        // Afegir els dies personalitzats si la recurrència és "personalitzada"
        $sqlDies = "INSERT INTO dies_rutina (id_rutina, dia_setmana) VALUES (:idRutina, :diaSetmana)";
        $stmtDies = $pdo->prepare($sqlDies);
        foreach ($dies as $dia) {
            $stmtDies->execute([
                ':idRutina' => $idRutina,
                ':diaSetmana' => $dia
            ]);
        }

        $pdo->commit();  // Confirma la transacció
        return $idRutina;
    } catch (PDOException $e) {
        $pdo->rollBack();  // Reverteix si hi ha error
        error_log("Error creant rutina: " . $e->getMessage());
        return false;
    }
}

function deleteRutina($pdo, $idRutina) {
    try {
        // Eliminar els dies associats a la rutina
        $sqlDies = "DELETE FROM dies_rutina WHERE id_rutina = :idRutina";
        $stmtDies = $pdo->prepare($sqlDies);
        $stmtDies->bindParam(':idRutina', $idRutina, PDO::PARAM_INT);
        $stmtDies->execute();
        
        // Ara eliminar la rutina principal
        $sqlRutina = "DELETE FROM rutines WHERE id_rutina = :idRutina";
        $stmtRutina = $pdo->prepare($sqlRutina);
        $stmtRutina->bindParam(':idRutina', $idRutina, PDO::PARAM_INT);
        $stmtRutina->execute();
        
        // Retorna true si s'ha eliminat la rutina
        return $stmtRutina->rowCount() > 0;
    } catch (PDOException $e) {
        error_log("Error en deleteRutina: " . $e->getMessage());
        return false;
    }
}


function updateRutina($pdo, $idRutina, $nomRutina, $descripcioRutina, $hora, $diesRutina) {
    try {
        // Actualitzar la rutina principal
        $sql = "UPDATE rutines 
                SET nom = :nom, descripcio = :descripcio, hora = :hora
                WHERE id_rutina = :idRutina";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom', $nomRutina, PDO::PARAM_STR);
        $stmt->bindParam(':descripcio', $descripcioRutina, PDO::PARAM_STR);
        $stmt->bindParam(':hora', $hora, PDO::PARAM_STR);
        $stmt->bindParam(':idRutina', $idRutina, PDO::PARAM_INT);
        $stmt->execute();

        // Eliminar els dies anteriors associats a la rutina
        $sqlDeleteDies = "DELETE FROM dies_rutina WHERE id_rutina = :idRutina";
        $stmtDeleteDies = $pdo->prepare($sqlDeleteDies);
        $stmtDeleteDies->bindParam(':idRutina', $idRutina, PDO::PARAM_INT);
        $stmtDeleteDies->execute();

        // Inserir els nous dies seleccionats
        $sqlInsertDies = "INSERT INTO dies_rutina (id_rutina, dia_setmana) VALUES (:idRutina, :dia)";
        $stmtInsertDies = $pdo->prepare($sqlInsertDies);
        foreach ($diesRutina as $dia) {
            $stmtInsertDies->bindParam(':idRutina', $idRutina, PDO::PARAM_INT);
            $stmtInsertDies->bindParam(':dia', $dia, PDO::PARAM_STR);
            $stmtInsertDies->execute();
        }

        return true;
    } catch (PDOException $e) {
        error_log("Error en updateRutina: " . $e->getMessage());
        return false;
    }
}




