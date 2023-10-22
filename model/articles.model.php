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

/**
 * Mètode que retorna tots els registres de la taula artícles
 * que coincideixin amb l'usuari especificat
 * @param $userId
 * @return array amb tots els registres de la taula artícles
 */
function findArticlesByUserId($userId) {
    try {
        $conexion = getConnection();
        $sql = "SELECT * FROM articles WHERE userId = :userId";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':userId', $userId);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo '<p style="color: red">Error 500: Ha hagut algún problema al llistar els articles :/</p>';
        die();
    } finally {
        $conexion = null;
    }
}


/**
 * Mètode per a afegir un article a la taula articles
 * @param $article article a afegir
 * @return true si s'ha afegit correctament, false altrament
 */
function addArticle($article) {
    try {
        $conexion = getConnection();
        $sql = "INSERT INTO articles (article, userId) VALUES (:article, :userId)";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':article', $article);
        $statement->bindParam(':userId', $_SESSION['userId']);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC) > 0;

    } catch (PDOException $e) {
        echo '<p style="color: red">Error 500: Ha hagut algún problema al afegir l\'article :/</p>';
        die();
    } finally {
        $conexion = null;
    }
}

/**
 * Mètode per a actualitzar un article de la taula articles
 * @param $articleId id de l'article a actualitzar
 * @param $article article actualitzat
 * @return true si s'ha actualitzat correctament, false altrament
 */
function updateArticle($articleId, $article) {
    try {
        $conexion = getConnection();
        $sql = "UPDATE articles SET article = :article WHERE id = :articleId";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':article', $article);
        $statement->bindParam(':articleId', $articleId);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC) > 0;

    } catch (PDOException $e) {
        echo '<p style="color: red">Error 500: Ha hagut algún problema al actualitzar l\'article :/</p>';
        die();
    } finally {
        $conexion = null;
    }
}

/**
 * Mètode per a eliminar un article de la taula articles
 * @param $articleId id de l'article a eliminar
 * @return true si s'ha eliminat correctament, false altrament
 */
function deleteArticle($articleId) {
    try {
        $conexion = getConnection();
        $sql = "DELETE FROM articles WHERE id = :articleId";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':articleId', $articleId);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC) > 0;

    } catch (PDOException $e) {
        echo '<p style="color: red">Error 500: Ha hagut algún problema al eliminar l\'article :/</p>';
        die();
    } finally {
        $conexion = null;
    }
}

?>