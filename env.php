<!-- Víctor Comino -->
<?php
function env_db()
{
    return array(
        'host' => 'mysql:host=localhost;dbname=pt05_victor_comino',
        'user' => 'root',
        'password' => ''
    );
}

function env_mail()
{
    return array(
        "debug" => 0,
        "Host" => "smtp.gmail.com",
        "Port" => 587,
        "SMTPSecure" => "tls",
        "SMTPAuth" => true,
        "Username" => "vcomino.daw.test@gmail.com",
        "Password" => "ysex zeyv abxo admm",
    );
}

function env_captcha()
{
    return array(
        "secret" => "6LdbnP4oAAAAAEpNaSJCbLdEJSGwnyOBEzXcpxJC",
    );
}

function env_oauth()
{
    return array(
        "client_id" => "1060032368369-9t5ncdnq883p8brhv0ine2tbbqtpsbb1.apps.googleusercontent.com",
        "client_secret" => "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"
    );
}
?>