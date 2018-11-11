<?php
    require '../config.php';
    $filename = basename(__FILE__,'.php');
    $customCss = "<link rel='stylesheet' type='text/css' href='/css/$filename.css'>";

    signUp();

    function signUp(){
        // si on a submit et qu'on a un username
        if(isset($_POST["submit"])){
            if(isset($_POST["username"]) && isset($_POST["password"])){
                $username = htmlspecialchars($_POST["username"]);
                $password = htmlspecialchars($_POST["password"]);
                try {
                    // on se connecte a la bdd
                    $database = new PDO('mysql:host=bdd;dbname=base_php_blog', 'admin', 'passw0rd');

                    // on verif si l'utilisateur existe
                    $isUsed = userExist($database, $username);

                    if($isUsed){
                        echo "Osti de criss de tabarnak de câliss !";
                    } else {
                        echo "pseudo dispo";
                        $isCreated = createUser($database, $username, $password);
                        if($isCreated){
                            echo "le compte est bien crée";
                        } else {
                            echo "Nique toi encore plus fdp de consanguin";
                        }
                    }

                } catch (Exception $e) {
                    echo 'Exception reçue : ',  $e->getMessage(), "\n";
                }
            } else {
                echo "Veuillez saisir tous les champs disponibles";
            }
        }
    }

    function userExist(PDO $connection, string $username): bool
    {
        $stmt = $connection->prepare("SELECT COUNT(username) FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch();
        return (bool) $result[0];
    }

    function createUser(PDO $connection, string $username, string $password)
    {
        $stmt = $connection->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt;
    }
    include 'header.php';
?>
<div class="container">
    <div>
        <h1>Inscription</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" class="form-control">
        <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control">
        <input type="submit" value="S'inscrire" name="submit" class="btn btn-primary">
    </form>
</div>
</body>