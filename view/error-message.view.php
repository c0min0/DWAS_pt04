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
        <h1 class="success">No s'ha pogut realitzar l'acció :/</h1>
        <?php 
        header("refresh:5;url=../controller/private.controller.php");
        ?>
    </div>
</body>

</html>