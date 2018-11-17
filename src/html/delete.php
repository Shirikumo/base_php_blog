<?php
require '../config.php';

$idArticle = (int) $_GET["id"];

deleteArticle($database, $idArticle);

function deleteArticle(PDO $connection, int $idArticle): void
{
    $stmt = $connection->prepare("DELETE FROM articles WHERE id = :id");
    $stmt->bindParam(':id', $idArticle);
    $stmt->execute();
}

header("location:/html/admin_page.php");