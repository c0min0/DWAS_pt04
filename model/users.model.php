<!-- Víctor Comino -->
<?php
require_once 'database.model.php';
require_once '../controller/utils/test.controller.php';


/**
 * Funció que retorna un usuari de la base de dades
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
        $password = cleanInput(password_hash($password, PASSWORD_DEFAULT));

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
?>