<!-- Víctor Comino -->
<?php

/**
 * Mètode que retorna el número de pàgina 
 * sol·licitat o 1 en el seu defecte.
 */
function getPage()
{
    return $_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['page']) ? $_GET['page'] : 1;
}

/**
 * Mètode que retorna el número d'articles per
 * pàgina sol·licitat o 5 en el seu defecte.
 */
function getNumArticles()
{
    return $_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['num_art']) ? $_GET['num_art'] : 5;
}

/**
 * Mètode que genera el llistat d'articles
 * @param $pg número de pàgina a la què ens trobem
 * @param $numeroArticles quantitat d'articles per pàgina
 * @param $articles array d'articles 
 * @param $editable indica si l'usuari pot editar els articles
 * @return string amb la llista d'articles en format html
 */
function generateList($pg, $numeroArticles, $articles, $editable = false)
{
    $saveButton = '<button type="submit" name="update" class="action-button"><img src="../view/assets/icons/save.svg"></button>';
    $removeButton = '<button type="submit" name="remove" class="action-button trash"><img src="../view/assets/icons/trash.svg"></button>';
    $startLiString = $editable ? '<li class="li-article">' : '<li>';
    $list = $startLiString;

    // Inici
    $i = ($pg - 1) * $numeroArticles;

    // Final
    $f = $i + $numeroArticles;

    // Generem entrades d'inici a final
    for ($i; $i < $f; $i++) {
        $article = $articles[$i];
        if ($editable) {
            $list .= '<span>' . strval($i + 1) . '. </span>' 
            .'<form class="inline input-article"><input class="input-article" type="text" name="selectedArticle" value="'
            .$article['article'].'"><span>'.$saveButton.$removeButton.'</span></form></li>';
        } else {          
            $list .= strval($i + 1) . '. ' . $article['article'] . '</li>';
        }

        // Si no és l'últim afegim una nova entrada
        if ($i < $f - 1) {
            $list .= $startLiString;
        }

        // Si hem arribat al final del total d'articles finalitzem el bucle
        if ($i == count($articles) - 1) {
            break;
        }
    }

    return $list;
}

/**
 * Mètode que genera la paginació com cal segons
 * el número d'articles per pàgina, la pàgina actual
 * i el total de pàgines.
 * @param $numeroArticles quantitat d'articles per pàgina
 * @param $pg pàgina actual
 * @param $totalPg total de pàgines
 * @return string amb el component html de la paginació generat
 */
function generatePaginacio($numeroArticles, $pg, $totalPg)
{
    $start_page = max(1, $pg - 2);
    $end_page = min($totalPg, $pg + 2);

    $paginacio = '<li>';

    // Per si estem a les primeres o últimes pàgines,
    // perquè se'ns mostri sempre 5 botons de pàgina
    if ($end_page - $start_page < 4) {
        if ($start_page == 1) {
            $end_page = min($totalPg, $start_page + 4);
        } else {
            $start_page = max(1, $end_page - 4);
        }
    }

    // Mostrem el botó "Primera Pàgina" si no estem a la primera pàgina
    if ($pg > 1) {
        $paginacio .= '<li><a href="?page=1&num_art=' . $numeroArticles . '">&laquo;&laquo;</a></li>';
    }

    // Mostrem el botó "Enrere" si no estem a la primera pàgina
    if ($pg > 1) {
        $paginacio .= '<li><a href="?page=' . ($pg - 1) . '&num_art=' . $numeroArticles . '">&laquo;</a></li>';
    }

    // Mosrem les pàgines
    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $pg) {
            $paginacio .= '<li class="current"><a href="#">' . $i . '</a></li>';
        } else {
            $paginacio .= '<li class="active"><a href="?page=' . $i . '&num_art=' . $numeroArticles . '">' . $i . '</a></li>';
        }
    }

    // Mostrem el botó "Endavant" si no estem a la última pàgina
    if ($pg < $totalPg) {
        $paginacio .= '<li><a href="?page=' . ($pg + 1) . '&num_art=' . $numeroArticles . '">&raquo;</a></li>';
    }

    // Mostrem el botó última àgina si no estem a la última pàgina
    if ($pg < $totalPg) {
        $paginacio .= '<li><a href="?page=' . $totalPg . '&num_art=' . $numeroArticles . '">&raquo;&raquo;</a></li>';
    }

    return $paginacio;
}

?>