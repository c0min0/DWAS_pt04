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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['page'])) {
    setcookie('page', $_GET['page'], time() + 3600);
    $pg = $_GET['page'];
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['num_art'])) {
    setcookie('num_art', $_GET['num_art'], time() + 3600);
    $numeroArticles = $_GET['num_art'];
}

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

$success = '';
if (isset($_GET['success']) && $_GET['success'] == 'true') {
    $success = '<h2 class="success">Procés executat amb èxit</h2>';
} else if (isset($_GET['success']) && $_GET['success'] == 'false') {
    $success = '<h2 class="error">El procés no s\'ha pogut realitzar l\'acció :(</h2>';
}

if (isset($_POST['add'])) {
    $article = $_POST['article'];
    if (addArticle($article)) {
        header('Location: private.controller.php?num_art=' . $numeroArticles . '&page=' . $pg . '&success=true');
        exit;
    }
    header('Location: private.controller.php?num_art=' . $numeroArticles . '&page=' . $pg . '&success=false');
    exit;
}

if (isset($_POST['update'])) {
    $articleId = $_POST['articleId'];
    $article = $_POST['selectedArticle'];
    if (updateArticle($articleId, $article)) {
        header('Location: private.controller.php?num_art=' . $numeroArticles . '&page=' . $pg . '&success=true');
        exit;
    }
    header('Location: private.controller.php?num_art=' . $numeroArticles . '&page=' . $pg . '&success=false');
    exit;
}

if (isset($_POST['delete'])) {
    $articleId = $_POST['articleId'];
    if (deleteArticle($articleId)) {
        header('Location: private.controller.php?num_art=' . $numeroArticles . '&page=' . $pg . '&success=true');
        exit;
    }
    header('Location: private.controller.php?num_art=' . $numeroArticles . '&page=' . $pg . '&success=false');
    exit;
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
$list = generateList($pg, $numeroArticles, $articles, true);

// Generem la paginació
$paginacio = generatePaginacio($numeroArticles, $pg, $totalPg);


// Mostrem la vista
include_once '../view/article-list-editable.view.php';
?>