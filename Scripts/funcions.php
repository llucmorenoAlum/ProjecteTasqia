<?php 
//Funcions de funcionament del programa

    function registrarUsuari($pdo, $usuari, $correu, $contrasenya){
        try {
            $data = new DateTime();
            $data->format('d-m-Y H:i:s');
            $contrasenyaCodificada = password_hash($contrasenya, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuaris (nom, correu, contrasenya, data_regitre) VALUES ('$usuari', '$correu', '$data')";
            $dades = $pdo->exec($sql);
        } catch (PDOException $e) {
            error_log("Error en registrarUsuari: " . $e->getMessage());
        }
    }

    /*function comprovarUsuariExistent($pdo, $correu){
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
    }*/

    function loginUsuari($pdo, $correu, $contrasenya) {
        $sql = "SELECT * FROM usuaris WHERE correu = :correu";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':correu', $correu, PDO::PARAM_STR);
        $stmt->execute();
        
        // Obtenir les dades de l'usuari en un array associatiu
        $dadesUsuari = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Verificar si existeix l'usuari i si la contrasenya és correcta
        if ($dadesUsuari && password_verify($contrasenya, $dadesUsuari['contrasenya'])) {
            return true;
        }
    
        return false;
    }
    

?>