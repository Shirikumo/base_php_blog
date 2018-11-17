<?php
require 'config.php';

postComment($database);

function postComment(PDO $db)
{
    if(isset($_POST["submit"]) && isset($_POST["content"]) && $_POST["content"] != ""){
        $name = htmlspecialchars($_SESSION["username"]);
        $content = htmlspecialchars($_POST["content"]);
        $idArticle = (int) $_GET["id"];
        $stmt = $db->prepare("INSERT INTO comments (username, content, article) VALUES (:username, :content, :article)");
        $stmt->bindParam(':username', $name);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':article', $idArticle);
        $stmt->execute();
        header("location:/html/article.php?id=$idArticle");
    } else {
        header("location:/html/home.php");
    }
}