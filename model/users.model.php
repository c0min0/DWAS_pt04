<!-- Víctor Comino -->
<?php
require_once 'database.model.php';
require_once '../controller/test/test.controller.php';

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

        $stmt->bindParam(':user', cleanInput($user));
        $stmt->bindParam(':password', cleanInput(password_hash($password, PASSWORD_DEFAULT)));
        $stmt->bindParam(':email', cleanInput($email));

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