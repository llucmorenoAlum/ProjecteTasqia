
<header>
    <div><img src="public/media/menu.webp" alt=""></div>
    <h1>Tasqia</h1>
    <div class="avatar-container">
        <img src="https://ui-avatars.com/api?rounded=true&name=<?php echo $_SESSION['nom']?>" 
             alt="Perfil" 
             id="avatar">
        <div id="dropdown-menu" class="hidden">
            <form action="index.php" method="post">
                <button name="accio" value="logout"><img id="imgLogout" src="public/media/logout.png" alt="">Tancar sessió</button>
            </form>
        </div>
    </div>
</header>
<script src="public/js/header.js"></script>
<nav>
    <form action="index.php" method="post">
        <button name="accio" value="mostrarTasques">Tàsques</button>
        <button name="accio" value="mostrarRutines">Rutines</button>
        <button name="accio" value="mostrarCalendari">Calendari</button>
        <button name="accio" value="mostrarNotes">Notes</button>
    </form>
</nav>