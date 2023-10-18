<!-- Víctor Comino -->
<?php

require_once 'model/articles.model.php';
require_once 'controller/utils/test.controller.php';
require_once 'controller/utils/paginacio.controller.php';

$user = '';
$logged = false;
$error = '';

session_start();

// Redirim a l'usuari a la pàgina privada si està autenticat
if (isset($_SESSION['userId'])) {
    header("Location: controller/private.controller.php");
    exit;
}

// Per mostrar quin error hi ha hagut si es que n'hi ha hagut
if (isset($_GET['error'])) {
    $error = cleanInput($_GET['error']).' error';
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['login'])) {
        header('Location: controller/login.controller.php');
        exit;
    } else if (isset($_GET['signup'])) {
        header('Location: controller/signup.controller.php');
        exit;
    } else if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: index.php');
        exit;
    }
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
$articles = findAllArticles();

// Missatge en cas de no tenir cap article a la bd
if (count($articles) == 0) {
    $list = '<li>No hi ha cap article :(</li>';
    $paginacio = '';
    include_once 'view/article-list.view.php';
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
include_once 'view/article-list.view.php';
?>