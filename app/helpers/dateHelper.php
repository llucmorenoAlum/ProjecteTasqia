<?php

    function obtenirDataActual() {
        return date("Y-m-d"); // Format: 2025-02-11
    }

    function obtenirDiaActual() {
        // Definir els noms dels dies en català
        $diesCatalans = ["diumenge", "dilluns", "dimarts", "dimecres", "dijous", "divendres", "dissabte"];
        
        // Obtenir el número del dia de la setmana (0 = diumenge, 1 = dilluns, ..., 6 = dissabte)
        $numeroDia = date("w");
    
        // Retornar el nom del dia en català
        return $diesCatalans[$numeroDia];
    }
    
    function obtenirDiaActualComplet(){
        $dies = ['diumenge', 'dilluns', 'dimarts', 'dimecres', 'dijous', 'divendres', 'dissabte'];
        $mesos = ['gener', 'febrer', 'març', 'abril', 'maig', 'juny', 'juliol', 'agost', 'setembre', 'octubre', 'novembre', 'desembre'];

        $now = new DateTime();
        $diaSetmana = $dies[$now->format('w')]; // Obté el nom del dia
        $dia = $now->format('j'); // Obté el dia del mes
        $mes = $mesos[$now->format('n') - 1]; // Obté el mes

        return ucfirst("$diaSetmana, $dia de $mes");
    }
    
    function formatDataEnCatala($dataString) {
        $data = new DateTime($dataString);
    
        // Traducció manual de dies i mesos
        $dies = ['Sunday' => 'Diumenge', 'Monday' => 'Dilluns', 'Tuesday' => 'Dimarts', 'Wednesday' => 'Dimecres', 'Thursday' => 'Dijous', 'Friday' => 'Divendres', 'Saturday' => 'Dissabte'];
        $mesos = ['January' => 'Gener', 'February' => 'Febrer', 'March' => 'Març', 'April' => 'Abril', 'May' => 'Maig', 'June' => 'Juny', 'July' => 'Juliol', 'August' => 'Agost', 'September' => 'Setembre', 'October' => 'Octubre', 'November' => 'Novembre', 'December' => 'Desembre'];
    
        // Obtenir el format inicial en anglès
        $diaEn = $data->format('l'); // Nom del dia en anglès
        $mesEn = $data->format('F'); // Nom del mes en anglès
    
        // Traduir
        $diaCat = $dies[$diaEn];
        $mesCat = $mesos[$mesEn];
    
        // Retornar la data en format: 'Dijous, 20 de Febrer. 17:00'
        return "$diaCat, " . $data->format('d') . " de $mesCat. " . $data->format('H:i');
    }
?>
