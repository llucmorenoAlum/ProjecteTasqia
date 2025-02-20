<?php

    function obtenirDataActual() {
        return date("Y-m-d"); // Format: 2025-02-11
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
