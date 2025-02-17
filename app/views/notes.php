<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasqia</title>
    <link rel="stylesheet" href="./public/css/styles.css">
</head>
<body>
    <?php 
        require_once 'app/controllers/indexController.php';
    ?>
    <header>
        <div><img src="public/media/menu.webp" alt=""></div>
        <h1>Tasqia</h1>
        <img src="https://ui-avatars.com/api?rounded=true&name=Lluc+Moreno" alt="Perfil">
    </header>
    <nav>
        <div>Taques</div>
        <div>Calendari</div>
        <div>Notes</div>
    </nav>
    <main>
        <button class="btnCrearTasca">+</button>
    </main>
</body>
</html>