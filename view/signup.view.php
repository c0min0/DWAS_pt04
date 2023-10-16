<!-- Víctor Comino -->
<!DOCTYPE html>
<html lang="ca-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../view/assets/styles/estils.css">
    <title>Víctor Comino</title>
</head>

<body>
    <div class="contenidor">
        <div class="nav">
            <span>
                <a href="../index.php" class="link-button">Torna</a>
            </span>
        </div>
        <h1>Registra't</h1>
        <section class="centered">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="user">Usuari:</label><br>
                <input type="text" name="user" required value="<?php echo $user;?>">
                <div class="error"><?php echo $errors['userErr']?></div>
                <br>
                <label for="email">Correu electrònic:</label><br>
                <input type="email" name="email" required value="<?php echo $email;?>">
                <div class="error"><?php echo $errors['emailErr']?></div>
                <br>
                <label for="password">Contrasenya:</label><br>
                <input type="password" name="password" required value="<?php echo $password;?>">
                <div class="error"><?php echo $errors['passErr']?></div>
                <br>
                <label for="repass">Repeteix la contrasenya:</label><br>
                <input type="password" name="repass" required value="<?php echo $repass;?>">
                <div class="error"><?php echo $errors['repassErr']?></div>
                <br>
                <input type="submit" value="Registra't" class="link-button">
                <br>
                <div class="error"><?php echo $errors['genericErr']?></div>
                <p>o <a href="login.controller.php">entra</a></p>
            </form>
        </section>
    </div>
</body>

</html>