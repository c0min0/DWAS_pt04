<!-- Víctor Comino -->
<?php

/**
 * Esborra els espais en blanc, les barres invertides i els caràcters especials.
 * @param $data Dades a netejar.
 * @return string Dades netejades.
 */
function cleanInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Comprova que la longitud de les dades estigui entre un mínim i un màxim.
 * @param $data Dades a comprovar.
 * @param $min Longitud mínima.
 * @param $max Longitud màxima.
 * @return bool True si la longitud es correcte, false si no ho es.
 */
function validateStrLength($data, $min, $max)
{
    $length = strlen($data);
    if ($length < $min || $length > $max) {
        return false;
    } else {
        return true;
    }
}

/**
 * Comprova que el correu electrònic sigui vàlid.
 * @param $data Dades a comprovar.
 * @return bool True si el correu electrònic es vàlid, false si no ho es.
 */
function validateEmail($data)
{
    return filter_var($data, FILTER_VALIDATE_EMAIL);
}

?>