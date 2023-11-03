<!-- Víctor Comino -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recupera la contrasenya</title>
    <link rel="stylesheet" href="../view/assets/styles/estils.css">
</head>
<body>
    <h2>Recupera el compte</h2>
    <section class="centered">
    <form method="post">
        <label for="new_password">Introdueix la nova contrasenya: </label><br><br>
        <input type="password" name="new_password" required value=<?=$new_password?>><br><br>
        <label for="repeat_password">Repeteix la contrasenya: </label><br><br>
        <input type="password" name="repeat_password" required value=<?=$repeat_password?>>
        <?=$errors?>
        <br><br>
        <input type="submit" value="Envia" class="link-button">
        <br>
        <br>
        <a href="../index.php">Torna a la pàgina principal</a>
    </form>
    </section>
</body>
</html>