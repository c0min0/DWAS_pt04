<!-- Víctor Comino -->
<?php
require_once "env.php";

/**
 * Mètode que retorna la conexió amb la base de dades
 * o informa que no ha estat possible
 */
function getConnection() {
    $env = env();
    try {
        return new PDO($env['host'], $env['user'], $env['password']);
    } catch (PDOException $e) {
        echo '<p style="color: red">Ha hagut algún problema al connectar amb la base de dades :/</p>';
        die();
    }
}

/**
 * Mètode que retorna tots els registres de la taula artícles
 */
function findAll() {
    try {
        $conexion = getConnection();
        $sql = "SELECT * FROM articles";
        $statement = $conexion->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo '<p style="color: red">Error 500: Ha hagut algún problema al llistar els articles :/</p>';
        die();
    } finally {
        $conexion = null;
    }
}
?>