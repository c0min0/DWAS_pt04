<!-- Víctor Comino -->
<?php

include __DIR__ . '/../../../vendor/autoload.php';

$config = [
    'callback' => 'http://localhost/practiques_backend/M07_UF1/Victor_Comino_Pt05/controller/utils/hybridauth/hybridauth-user.controller.php',
    'keys' => [
        'id' => '9534514f0ef728dbcf12',
        'secret' => '481b78ae280fcda59661bde4ebe10dda7e95b15d'
    ],
];

$github = new Hybridauth\Provider\GitHub($config);

$github->authenticate();

try {
    $emailHybridauth = $github->getUserProfile()->email;

    $github->disconnect();

} catch (\Exception $e) {
    echo 'Oops! We ran into an unknown issue: ' . $e->getMessage();
}
