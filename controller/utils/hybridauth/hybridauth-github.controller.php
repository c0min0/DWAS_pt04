<!-- Víctor Comino -->
<?php
require_once __DIR__ . '/../../../env.php';
include __DIR__ . '/../../../vendor/autoload.php';

$config = [
    'callback' => env_hybridauth()['callback'],
    'keys' => [
        'id' => env_hybridauth()['key_id'],
        'secret' => env_hybridauth()['key_secret'],
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
