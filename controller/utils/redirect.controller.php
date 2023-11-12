<!-- Víctor Comino -->
<?php
//TODO: No funciona
/**
 * Redirigeix a la pàgina privada
 */
function redirectToPrivate()
{
    header("Location: " . __DIR__ . "/../private.controller.php");
    exit;
}

//TODO: No funciona
/**
 * Redirigeix a la pàgina de login
 */
function redirectToLogin()
{
    header("Location: " . __DIR__ . "/../login.controller.php");
    exit;
}

//TODO: No funciona
/**
 * Redirigeix a la pàgina de registre
 */
function privateGuard()
{
    session_start();
    if (!isset($_SESSION['userId'])) {
        redirectToLogin();
    }
}

//TODO: No funciona
/**
 * Redirigeix a la pàgina de login si l'usuari està autenticat
 */
function loginGuard()
{
    session_start();
    if (isset($_SESSION['userId'])) {
        redirectToPrivate();
    }
}

/**
 * Comprova si el mail de l'autenticació externa existeix a la base de dades
 * i sinó, crea un usuari per aquest email
 * @param string $email email de l'autenticació externa
 */
function externalUserAuth($email)
{
    // Si tenim l'email del compte extern
    if (isset($email)) {

        // Busquem l'usuari a la base de dades
        $user = findUserByEmail($email);

        // Si no existeix, l'afegim
        if (!$user) {
            addUser($email, $email);
            $user = findUserByEmail($email);
        }

        // Iniciem sessió
        $_SESSION['userId'] = $user['id'];
    }
}
