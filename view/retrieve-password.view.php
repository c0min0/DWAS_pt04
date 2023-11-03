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
        <label for="email">Introdueix el teu correu electrònic:</label><br><br>
        <input type="email" name="email" required value=<?=$email?>>
        <?=$errors?>
        <input type="submit" value="Envia" class="link-button">
        <br>
        <br>
        <a href="../index.php">Torna a la pàgina principal</a>
    </form>
    </section>
</body>
</html>