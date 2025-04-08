<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/calendari.css">
</head>
<body>
    <?php 
        require_once 'app/controllers/indexController.php';
        require_once 'app/views/header.php'
    ?>
    <main>
        <div class="calendar-container">
            <div class="calendar-header">
                <button id="prevBtn">◀</button>
                <h2 id="calendarTitle"></h2>
                <button id="nextBtn">▶</button>
            </div>
            <div class="calendar-controls">
                <button data-view="day">Dia</button>
                <button data-view="week">Setmana</button>
                <button data-view="month">Mes</button>
            </div>
            <div id="calendar"></div>
        </div>
        <script>
            const tasques = <?php echo json_encode($tasquesUsuari);?>;
        </script>
        <script src="public/js/calendari.js"></script>
    </main>
</body>
</html>