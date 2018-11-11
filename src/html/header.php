<?php
if ($_GET['disconnect'] == 1) {
    session_destroy();
    header("location:/html/home.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Theo Dalleau">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/header.css">
    <?php echo "$customCss"; ?>
    <title>BASE PHP BLOG</title>
</head>
<body>
    <header>
        <div>
            <a href="home.php">Mon blog</a>
        </div>
        <nav>
            <?php
                if(isset($_SESSION["username"])){?>
            <ul>
                <li><?php echo "Bonjour " .$_SESSION["username"] ." !"; ?></li>
                <li><a href="?disconnect=1">Déconnexion</a></li>
            </ul><?php
                } else {?>
            <ul>
                <li><a href="sign_up.php">Inscription</a></li>
                <li><a href="sign_in.php">Connexion</a></li>
            </ul><?php
                }?>
        </nav>
    </header>
