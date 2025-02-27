<?php
    function insertNota($pdo, $idUsuari, $titol, $contingut = null) {
        try {
            // Obtenir la data i hora actual en format DATETIME
            $dataCreacio = (new DateTime())->format('Y-m-d H:i:s');
    
            // Construir la consulta SQL segons si hi ha contingut o no
            if ($contingut !== null) {
                $sql = "INSERT INTO notes (id_usuari, titol, contingut, data_creacio) 
                        VALUES (:idusuari, :titol, :contingut, :dataCreacio)";
            } else {
                $sql = "INSERT INTO notes (id_usuari, titol, data_creacio) 
                        VALUES (:idusuari, :titol, :dataCreacio)";
            }
    
            $stmt = $pdo->prepare($sql);
    
            // Lligar els valors comuns
            $stmt->bindParam(':idusuari', $idUsuari, PDO::PARAM_INT);
            $stmt->bindParam(':titol', $titol, PDO::PARAM_STR);
            $stmt->bindParam(':dataCreacio', $dataCreacio, PDO::PARAM_STR);
    
            // Lligar el contingut només si s'ha definit
            if ($contingut !== null) {
                $stmt->bindParam(':contingut', $contingut, PDO::PARAM_STR);
            }
    
            return $stmt->execute(); // Retorna `true` si la inserció és correcta
        } catch (PDOException $e) {
            error_log("Error en insertNota: " . $e->getMessage());
            return false;
        }
    }
    
    function getNotesUsuari($pdo, $idUsuari) {
        try {
            $sql = "SELECT * FROM notes WHERE id_usuari = :idusuari ORDER BY data_creacio DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':idusuari', $idUsuari, PDO::PARAM_INT);
            
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna un array associatiu amb les notes
            
        } catch (PDOException $e) {
            error_log("Error en getNotesUsuari: " . $e->getMessage());
            return [];
        }
    }

    function deleteNota($pdo, $idNota){
        try {
            $sql = "DELETE FROM notes WHERE id_notes = :idNota";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':idNota', $idNota, PDO::PARAM_INT);
            $stmt->execute();
    
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error en deleteNota: " . $e->getMessage());
            return false;
        }
    }

    function updateNota($pdo, $idNota, $titolNota, $contingutNota){
        try {
            $sql = "UPDATE notes SET titol = :titol, contingut = :contingut WHERE id_notes = :idNota";
            
            if($contingutNota == "" || $contingutNota == null){
                $contingutNota = "Sense contingut";
            }

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':titol', $titolNota, PDO::PARAM_STR);
            $stmt->bindParam(':contingut', $contingutNota, PDO::PARAM_STR);
            $stmt->bindParam(':idNota', $idNota, PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en updateNota: " . $e->getMessage());
            return false;
        }
    }
    