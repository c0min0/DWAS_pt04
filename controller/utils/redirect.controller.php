<?php

/**
 * Redirigeix a una URL
 * @param string $url URL a la que redirigir
 */
function redirectTo($url)
{
    header("Location: $url");
    exit;
}

/**
 * Redirigeix a la pàgina privada
 */
function redirectToPrivate()
{
    redirectTo('../controller/private.controller.php');
}

/**
 * Redirigeix a la pàgina de login
 */
function redirectToLogin()
{
    redirectTo('../controller/login.controller.php');
}

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
