<?php
    require_once 'app/models/UserModel.php';
    require_once 'config/database.php';

    function mostrarlogin(){
        require_once 'app/views/login.php';
    }

    function mostrarRegistre(){
        require_once 'app/views/registre.php';
    }