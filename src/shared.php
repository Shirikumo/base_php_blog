<?php
    function userExist(PDO $connection, string $username): bool
    {
        $stmt = $connection->prepare("SELECT COUNT(username) FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch();
        return (bool) $result[0];
    }
    function redirection(string $url): void
    {
        echo '<script language="Javascript">
            document.location.replace("' . $url . '");
         </script>';
    }
    function dbConnect(string $db, string $host, string $db_user, string $db_password)
    {
        try {
            $database = new PDO("mysql:host=$host;dbname=$db", $db_user, $db_password);
            return $database;
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }