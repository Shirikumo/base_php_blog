<?php
require '../config.php';

if(!isset($_SESSION["username"])){
    header("location:https://www.youtube.com/watch?v=QtcL96CDJf8");
}

$numPage = 0;

if(!isset($_GET["page"]) || $_GET["page"] == 0){
    header("location:/html/admin_page.php?page=1");
} else {
    $numPage = (int) $_GET["page"];
}

$strWelcome = <<<'WELCOME'
    <h2>Vos articles</h2>
WELCOME;

$offset = 5 * $numPage - 5;

$author = (string) $_SESSION["username"];

function getMyArticles(PDO $database, int $offset, string $author): array
{
    $stmt = $database->prepare("SELECT id, title, image FROM articles WHERE author = :author LIMIT :offset , 5");
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':offset', $offset,PDO::PARAM_INT);
    $stmt->execute();
    $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $stmt;
}

function preventNextPage(PDO $database, $numPage, $author)
{
    $stmt = $database->prepare("SELECT COUNT(id) FROM articles WHERE author = :author");
    $stmt->bindParam(':author', $author);
    $stmt->execute();
    $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
    $result = (int) $stmt["COUNT(id)"];
    if($result <= (5 * $numPage) ){
        return false;
    } else {
        return true;
    }
}

include 'header.php';
?>

<div class="container">
    <?php echo $strWelcome; ?>

    <div class="flexy-col">
        <?php
        $articles = getMyArticles($database, $offset, $author);

        if(count($articles) != 0) {

            for($c=0; $c < count($articles); $c++) { ?>

                    <div class="flexy">
                        <div class="d-col">
                            <h1><?= $articles[$c]['title'] ?></h1>
                            <div class="d-flex">
                                <a href="/html/article.php?id=<?= $articles[$c]['id'] ?>" class="btn-custom">Voir</a>
                                <a href="/html/delete.php?id=<?= $articles[$c]['id'] ?>" class="btn-custom">Supprimer</a>
                                <a href="/html/edit.php?id=<?= $articles[$c]['id'] ?>" class="btn-custom">Modifier</a>
                            </div>
                        </div>
                        <img src="../<?= $articles[$c]['image'] ?>">
                    </div>

                <?php  } } else if ($numPage == 1){ ?>
            <h1>Vous n'avez aucun articles...</h1>

        <?php } else { redirection("https://www.youtube.com/watch?v=QtcL96CDJf8"); } ?>
    </div>
    <div class="flexy-arr">
        <?php if($_GET["page"] > 1) { ?>
            <a href="/html/admin_page.php?page=<?php echo ($numPage-1); ?>" class="btn-custom">Précédent</a> <?php } ?>
        <?php $tmp = preventNextPage($database, $numPage, $author);
        if($tmp) { ?>
            <a href="/html/admin_page.php?page=<?php echo ($numPage+1); ?>" class="btn-custom">Suivant</a> <?php } ?>
    </div>
</div
</body>