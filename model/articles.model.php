<!-- Víctor Comino -->
<?php

require_once 'database.model.php';

/**
 * Mètode que retorna tots els registres de la taula artícles
 * @return array amb tots els registres de la taula artícles
 */
function findAllArticles() {
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