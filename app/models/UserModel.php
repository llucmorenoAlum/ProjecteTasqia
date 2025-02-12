<?php

function comprovarUsuariExistent($pdo, $correu){
    try {
        $sql = "SELECT COUNT(*) FROM usuaris WHERE correu = :correu";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':correu', $correu, PDO::PARAM_STR);
        $stmt->execute();
        
        $count = $stmt->fetchColumn();
        return $count > 0;
    } catch (PDOException $e) {
        error_log("Error en comprovarUsuariExistent: " . $e->getMessage());
        return false;
    }
}

function afegirUsuari(PDO $pdo, string $usuari, string $correu, string $contrasenya): bool {
    $contrasenyaEncriptada = password_hash($contrasenya, PASSWORD_DEFAULT);
    
    try {
        $sql = "INSERT INTO usuaris (nom, correu, contrasenya) VALUES (:usuari, :correu, :contrasenya)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':usuari', $usuari, PDO::PARAM_STR);
        $stmt->bindParam(':correu', $correu, PDO::PARAM_STR);
        $stmt->bindParam(':contrasenya', $contrasenyaEncriptada, PDO::PARAM_STR);
        
        return $stmt->execute(); // Retorna true si s'ha inserit correctament
    } catch (PDOException $excepcion) {
        error_log("Error en afegirUsuari: " . $excepcion->getMessage());
        return false; // No exposa informació sensible a l'usuari
    }
}
?>
