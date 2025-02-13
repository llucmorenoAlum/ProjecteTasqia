<?php
    require_once 'app/models/UserModel.php';
    require_once 'config/database.php';

    function mostrarlogin(){
        require_once 'app/views/login.php';
    }

    function mostrarRegistre(){
        require_once 'app/views/registre.php';
    }

    function registrarUsuari($usuari, $correu, $contrasenya){
        $pdo = conectarBD();
        if(!comprovarUsuariExistent($pdo, $correu)){
            afegirUsuari($pdo, $usuari, $correu, $contrasenya);
        }
    }

    function loginUsuari($usuari, $correu, $contrasenya){
        $pdo = conectarBD();
        if(comprovarUsuariExistent($pdo, $correu)){
            comprovarContrasenya($pdo);  
        }
    }