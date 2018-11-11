<?php
    require '../config.php';
    $filename = basename(__FILE__,'.php');
    $customCss = "<link rel='stylesheet' type='text/css' href='/css/$filename.css'>";

    signIn();

    function signIn(){
        // si on a submit et qu'on a un username
        if(isset($_POST["submit"])){
            if(isset($_POST["username"]) && isset($_POST["password"])){
                $username = htmlspecialchars($_POST["username"]);
                $password = htmlspecialchars($_POST["password"]);
                try {
                    // on se connecte a la bdd
                    $database = new PDO('mysql:host=bdd;dbname=base_php_blog', 'admin', 'passw0rd');

                    $isVerified = verifyLogin($database, $username, $password);
                    if($isVerified){
                        $_SESSION["username"] = $username;
                        header("Location:/html/home.php");
                    } else {
                        echo "Caliss de tabernak qui s'en bat les gosses ; Criss!";
                    }

                } catch (Exception $e) {
                    echo 'Exception reçue : ',  $e->getMessage(), "\n";
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
        <h1>Connexion</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" class="form-control">
        <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control">
        <input type="submit" value="Se connecter" name="submit" class="btn btn-primary">
    </form>
</div>
</body>