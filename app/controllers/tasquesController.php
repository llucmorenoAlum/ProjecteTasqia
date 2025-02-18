<?php
    require_once 'app/models/TasquesModel.php';

    function crearNovaTasca($idUsuari, $nomTasca, $dataTasca, $descripcioTasca){

        insertTasca($nomTasca, $dataTasca, $descripcioTasca);
    }