<?php
require '../config.php';

$idArticle = (int) $_GET["id"];

if(isset($_POST["submit"])){
    $title = htmlspecialchars($_POST["title"]);
    $content = htmlspecialchars($_POST["content"]);
    editArticle($database, $title, $content, $idArticle);
}

function getEditArticle(PDO $connection, int $idArticle)
{
    $stmt = $connection->prepare("SELECT title, content FROM articles WHERE id = :id");
    $stmt->bindParam(':id', $idArticle, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}

$editArt = getEditArticle($database, $idArticle);
$editTitle = htmlspecialchars($editArt['title']);
$editContent = htmlspecialchars($editArt['content']);

function editArticle(PDO $connection, $title, $content, $idArticle):void
{
    $stmt = $connection->prepare("UPDATE articles SET title = :title, content = :content WHERE id = :id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':id',$idArticle);
    $stmt->execute();
    header("location:/html/home.php");
}

include 'header.php';
?>

<div class="container">
    <h2>Modifier un article</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="title" id="title" placeholder="Titre..." class="form-control" value="<?= $editTitle?>">
        <textarea rows="10" name="content" id="content" placeholder="Contenu..." class="form-control content"><?= $editContent?></textarea>
        <input type="submit" value="Modifier" name="submit" class="btn btn-primary">
    </form>
</div>

</body>



header("location:/html/admin_page.php");