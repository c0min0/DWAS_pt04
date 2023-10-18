<!-- Víctor Comino -->
<?php

require_once '../model/articles.model.php';
require_once 'utils/test.controller.php';
require_once 'utils/paginacio.controller.php';

$user = '';
$logged = false;
$error = '';

session_start();

// Redirim a l'usuari a la pàgina d'inici de sessió si no està autenticat
if (!isset($_SESSION['userId'])) {
    header("Location: login.controller.php");
    exit;
}

// Si se sol·licita tancar la sessió, redirigim a la pàgina principal
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../index.php');
    exit;
}


// Establim el número de pàgina en la que l'usuari es troba
$pg = getPage();

// Establim el número d'articles per pàgina
$numeroArticles = getNumArticles();

// Perquè se seleccioni el número d'articles 
// al desplegable que coincideix amb els de la pàgina
$cinc = $deu = $quinze = $vint = '';
switch ($numeroArticles) {
    case 5:
        $cinc = 'selected';
        break;
    case 10:
        $deu = 'selected';
        break;
    case 15:
        $quinze = 'selected';
        break;
    case 20:
        $vint = 'selected';
}

// Obtenim els registres
$articles = findArticlesByUserId($_SESSION['userId']);

// Missatge en cas de no tenir cap article a la bd
if (count($articles) == 0) {
    $list = '<li>No hi ha cap article :(</li>';
    $paginacio = '';
    include_once '../view/article-list-editable.view.php';
    return;
}

// Calculem el total de pàgines
$totalPg = intval(count($articles) / $numeroArticles) + 1;

// Per tornar a la pagina principal si l'usuari 
// intenta accedir a una pagina que no existeix
if ($pg > $totalPg) {
    header('Location: index.php?num_art=' . $numeroArticles);
    exit;
}

// Generem el llistat d'articles
$list = generateList($pg, $numeroArticles, $articles);

// Generem la paginació
$paginacio = generatePaginacio($numeroArticles, $pg, $totalPg);


// Mostrem la vista
include_once '../view/article-list-editable.view.php';
?>