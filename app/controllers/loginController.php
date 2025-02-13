<?php
    require_once 'app/models/UserModel.php';
    require_once 'config/database.php';

    function mostrarlogin($error = ""){
        $error;
        require_once 'app/views/login.php';
    }

    function mostrarRegistre($error = ""){
        $error;
        require_once 'app/views/registre.php';
    }

    function registrarUsuari($usuari, $correu, $contrasenya){
        $pdo = conectarBD();
        if(!comprovarUsuariExistent($pdo, $correu)){
            afegirUsuari($pdo, $usuari, $correu, $contrasenya);
            return true;
        }else{
            return false;
        }
    }

    function loginUsuari($correu, $contrasenya){
        $pdo = conectarBD();
        if(comprovarUsuariExistent($pdo, $correu)){
            if(comprovarContrasenya($pdo,$correu, $contrasenya)){
                return true;
            }else {
                return false;
            }
        }else{
            return false;
        }
    }