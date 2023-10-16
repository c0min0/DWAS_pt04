<?php
$successSignup = '';

if (isset($_GET['signup']) ? $_GET['signup'] == 'ok' : false) {
    $successSignup = '<h2 class="success">Us heu registrat amb èxit! Ja podeu iniciar sessió</h2>';
}
include_once '../view/login.view.php';
?>