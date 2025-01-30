<?php
//variables

$BD = 'Tasqia'
$user = 'fidel'
$pass = '1234'

//Funció de connexió
function conectarBD(){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=' . $BD, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
        ?>
    <?php }
    catch (PDOException $e) {
        ?>
      <h4>Error de connexió: <?php echo $e->getMessage();?></h4>
    <?php }
    return $pdo;
}