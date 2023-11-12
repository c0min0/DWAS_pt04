<!-- Víctor Comino -->
<?php
require_once __DIR__ . '/../env.php';

/**
 * Mètode que retorna la conexió amb la base de dades
 * o informa que no ha estat possible
 * @return PDO connexió amb la base de dades
 */
function getConnection() {
    $env = env_db();
    try {
        return new PDO($env['host'], $env['user'], $env['password']);
    } catch (PDOException $e) {
        echo '<p style="color: red">Ha hagut algún problema al connectar amb la base de dades :/</p>';
        die('ERROR: ' . $e->getMessage());
    }
}

?>