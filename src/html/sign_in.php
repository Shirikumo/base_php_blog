<?php
    require '../config.php';

    if(isset($_SESSION["username"])){
        header("location:https://www.youtube.com/watch?v=QtcL96CDJf8");
    }

    signIn($database);

    function signIn($database)
    {
        if(isset($_POST["submit"])){
            if($_POST["username"] != "" && $_POST["password"] != ""){
                $username = htmlspecialchars($_POST["username"]);
                $password = htmlspecialchars($_POST["password"]);

                $isVerified = verifyLogin($database, $username, $password);
                if($isVerified){
                    $_SESSION["username"] = $username;
                    header("Location:/html/home.php");
                } else {
                    echo "Caliss de tabernak qui s'en bat les gosses ; Criss!";
                }

            } else {
                echo "Veuillez saisir tous les champs disponibles";
            }
        }
    }


    function verifyLogin(PDO $connection, string $username, string $password): bool
    {
        $stmt = $connection->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch();
        if (!empty($result)) {
            $verifyUser = TRUE;
        } else {
            $verifyUser = FALSE;
        }
        return (bool)$verifyUser;
    }
    include 'header.php';
?>
<div class="container">
    <div>
        <h2>Connexion</h2>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" class="form-control">
        <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control">
        <input type="submit" value="Se connecter" name="submit" class="btn btn-primary">
    </form>
</div>
</body>