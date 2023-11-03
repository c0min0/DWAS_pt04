<!-- Víctor Comino -->
<?php
require_once 'database.model.php';
require_once '../controller/utils/test.controller.php';

/**
 * Funció que retorna un usuari de la base de dades
 * @param $id identificador de l'usuari
 * @return array amb l'usuari
 */
function findUserById($id) {
    $id = cleanInput($id);

    try {
        $conexion = getConnection();

        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetch();
    } catch (PDOException $e) {
        echo '<p style="color: red">Error 500: Ha hagut algún problema al obtenir l\'usuari :/</p>';
        die();
    } finally {
        $conexion = null;
    }
}


/**
 * Funció que retorna un usuari de la base de dades
 * @param $user nom d'usuari
 * @return array amb l'usuari
 */
function findUserByUsername($user) {
    $user = cleanInput($user);

    try {
        $conexion = getConnection();

        $sql = "SELECT * FROM users WHERE user = :user";
        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(':user', $user);

        $stmt->execute();

        return $stmt->fetch();
    } catch (PDOException $e) {
        echo '<p style="color: red">Error 500: Ha hagut algún problema al obtenir l\'usuari :/</p>';
        die();
    } finally {
        $conexion = null;
    }
}

/**
 * Funció que retorna un usuari de la base de dades
 * @param $email correu electrònic
 * @return array amb l'usuari
 */
function findUserByEmail($email) {
    $email = cleanInput($email);

    try {
        $conexion = getConnection();

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(':email', $email);

        $stmt->execute();

        return $stmt->fetch();
    } catch (PDOException $e) {
        echo '<p style="color: red">Error 500: Ha hagut algún problema al obtenir l\'usuari :/</p>';
        die();
    } finally {
        $conexion = null;
    }
}

/**
 * Funció que insereix un nou usuari a la base de dades
 * @param $user nom d'usuari
 * @param $email correu electrònic
 * @param $password contrasenya
 * @return bool true si s'ha inserit correctament, false altrament
 */
function addUser($user, $email, $password)
{
    try {
        $conexion = getConnection();

        $sql = "INSERT INTO users (user, email, password) VALUES (:user, :email, :password)";
        $stmt = $conexion->prepare($sql);

        $user = cleanInput($user);
        $email = cleanInput($email);
        $password = password_hash(cleanInput($password), PASSWORD_DEFAULT);

        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        echo '<p style="color: red">Error 500: Ha hagut algún problema al afegir l\'usuari :/</p>';
        die();
    } finally {
        $conexion = null;
    }
}

function updateRetrieveToken($userId) {
    try {
        $conexion = getConnection();

        $sql = "UPDATE users SET retrieveToken = :retrieveToken, retrieveTokenExpiration = :retrieveTokenExpiration WHERE id = :userId";
        $stmt = $conexion->prepare($sql);

        $retrieveToken = bin2hex(random_bytes(50).time().$userId);
        $retrieveTokenExpiration = time() + 1800;
        
        $stmt->bindParam(':retrieveToken', $retrieveToken);
        $stmt->bindParam(':retrieveTokenExpiration', $retrieveTokenExpiration);
        $stmt->bindParam(':userId', $userId);

        $stmt->execute();

        return $retrieveToken;
    } catch (PDOException $e) {
        echo '<p style="color: red">Error 500: Ha hagut algún problema al actualitzar el token de recuperació :/</p>';
        die();
    } finally {
        $conexion = null;
    }
}

function findUserByToken($token) {
    try {
        $conexion = getConnection();

        $sql = "SELECT * FROM users WHERE retrieveToken = :token AND retrieveTokenExpiration > :now";
        $stmt = $conexion->prepare($sql);

        $now = time();

        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':now', $now);

        $stmt->execute();

        return $stmt->fetch();
    } catch (PDOException $e) {
        echo '<p style="color: red">Error 500: Ha hagut algún problema al obtenir l\'usuari :/</p>';
        die();
    } finally {
        $conexion = null;
    }
}

function updatePasswordById($userId, $password) {
    try {
        $conexion = getConnection();

        $sql = "UPDATE users SET password = :password WHERE id = :userId";
        $stmt = $conexion->prepare($sql);

        $password = password_hash(cleanInput($password), PASSWORD_DEFAULT);

        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':userId', $userId);

        $stmt->execute();

        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        echo '<p style="color: red">Error 500: Ha hagut algún problema al actualitzar la contrasenya :/</p>';
        die();
    } finally {
        $conexion = null;
    }
}
?>