<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'tasqia_db');
define('DB_USER', 'root');
define('DB_PASS', '');

function conectarBD(){
    try {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
        ?>
    <?php }
    catch (PDOException $e) {
        ?>
        <h4>Error de connexió<?php echo $e->getMessage();?></h4>
    <?php }
    return $pdo;
}

?>
