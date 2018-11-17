<?php
    require '../config.php';

    if(isset($_SESSION["username"])){
        header("location:https://www.youtube.com/watch?v=QtcL96CDJf8");
    }

    signUp($database);

    function signUp($database)
    {
        // si on a submit et qu'on a un username
        if(isset($_POST["submit"])){
            if($_POST["username"] != "" && $_POST["password"] != ""){
                $options = ['cost' => 12];
                $username = htmlspecialchars($_POST["username"]);
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

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

            } else {
                echo "Veuillez saisir tous les champs disponibles";
            }
        }
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
        <h2>Inscription</h2>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" class="form-control">
        <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control">
        <input type="submit" value="S'inscrire" name="submit" class="btn btn-primary">
    </form>
</div>
</body>