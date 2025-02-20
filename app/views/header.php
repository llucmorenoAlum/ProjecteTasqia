
<header>
    <div><img src="public/media/menu.webp" alt=""></div>
    <h1>Tasqia</h1>
    <img src="https://ui-avatars.com/api?rounded=true&name=<?php echo $_SESSION['nom']?>" alt="Perfil">
</header>
<nav>
    <form action="index.php" method="post">
        <button name="accio" value="mostrarTasques">Tasques</button>
        <button name="accio" value="mostrarCalendari">Calendari</button>
        <button name="accio" value="mostrarNotes">Notes</button>
    </form>
</nav>